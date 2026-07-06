<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Anggota;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggotaExport;
use App\Http\Requests\StoreAnggotaRequest; 
use App\Http\Requests\UpdateAnggotaRequest;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::latest()->get();
        
        // Statistik
        $totalAnggota = Anggota::count();
        $anggotaAktif = Anggota::where('status', 'Aktif')->count();
        $anggotaNonaktif = Anggota::where('status', 'Nonaktif')->count();
        
        return view('anggota.index', compact(
            'anggotas',
            'totalAnggota',
            'anggotaAktif',
            'anggotaNonaktif'
        ));
    }

    /**
     * Export data anggota 
     */
    public function export()
{
    $anggotas = Anggota::all();

    $filename = 'anggota_' . date('Y-m-d_His') . '.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    $callback = function () use ($anggotas) {

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'Kode Anggota',
            'Nama',
            'Email',
            'Telepon',
            'Alamat',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Pekerjaan',
            'Status',
            'Tanggal Daftar',
        ]);

        foreach ($anggotas as $anggota) {
            fputcsv($file, [
                $anggota->kode_anggota,
                $anggota->nama,
                $anggota->email,
                $anggota->telepon,
                $anggota->alamat,
                $anggota->tanggal_lahir,
                $anggota->jenis_kelamin,
                $anggota->pekerjaan,
                $anggota->status,
                $anggota->tanggal_daftar,
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

    /**
     * Advanced Search & Filter Anggota.
     */
    public function search(Request $request)
    {
        $query = Anggota::query();
        
        if ($request->keyword) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->keyword . '%')
                  ->orWhere('email', 'like', '%' . $request->keyword . '%')
                  ->orWhere('telepon', 'like', '%' . $request->keyword . '%');
            });
        }
        
        if ($request->jenis_kelamin) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }
        
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        if ($request->pekerjaan) {
            $query->where('pekerjaan', $request->pekerjaan);
        }
        
        $anggotas = $query->latest()->get();
        
        // Menghitung ulang Statistik berdasarkan hasil filter agar sinkron di layar
        $totalAnggota = $anggotas->count();
        $anggotaAktif = $anggotas->where('status', 'Aktif')->count();
        $anggotaNonaktif = $anggotas->where('status', 'Nonaktif')->count();
        
        return view('anggota.index', compact(
            'anggotas',
            'totalAnggota',
            'anggotaAktif',
            'anggotaNonaktif'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
{
    $anggota = Anggota::findOrFail($id);

    // Query riwayat peminjaman dengan filter status
    $query = Transaksi::with('buku')->where('anggota_id', $id);

    if ($request->filled('status') && $request->status !== 'Semua') {
        $query->where('status', $request->status);
    }

    $riwayatTransaksi = $query->orderByDesc('tanggal_pinjam')->get();

    // Statistik (tidak terpengaruh filter, selalu total keseluruhan)
    $statistikPeminjaman = [
        'total_pinjam'        => Transaksi::where('anggota_id', $id)->count(),
        'total_denda'         => Transaksi::where('anggota_id', $id)->sum('denda'),
        'sedang_dipinjam'     => Transaksi::where('anggota_id', $id)->where('status', 'Dipinjam')->count(),
        'sudah_dikembalikan'  => Transaksi::where('anggota_id', $id)->where('status', 'Dikembalikan')->count(),
    ];

    return view('anggota.show', compact('anggota', 'riwayatTransaksi', 'statistikPeminjaman'));
}

    public function create()
    {
        $kodeAnggota = $this->generateKodeAnggota();
        return view('anggota.create', compact('kodeAnggota'));
    }   

    public function edit(string $id)
    { 
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaRequest $request)
{
    $data = $request->validated();

    if (!isset($data['kode_anggota'])) {
        $data['kode_anggota'] = $this->generateKodeAnggota();
    }

    $data['tanggal_daftar'] = now();
    $data['status'] = 'Aktif';

    Anggota::create($data);

    return redirect()
        ->route('anggota.index')
        ->with('success', 'Anggota berhasil ditambahkan!');
}

    public function update(UpdateAnggotaRequest $request, string $id)
    {
        try {
            $anggota = Anggota::findOrFail($id);
            
            // Update anggota dengan validated data
            $anggota->update($request->validated());
            
            // Redirect dengan success message
            return redirect()->route('anggota.show', $anggota->id)
                            ->with('success', 'Data anggota berhasil diupdate!');
                            
        } catch (\Exception $e) {
            // Redirect dengan error message jika gagal
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal mengupdate anggota: ' . $e->getMessage());
        }
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        try {
            $anggota = Anggota::findOrFail($id);
            $namaAnggota = $anggota->nama;
            
            // Delete anggota
            $anggota->delete();
            
            // Redirect dengan success message
            return redirect()->route('anggota.index')
                            ->with('success', "Anggota '{$namaAnggota}' berhasil dihapus!");
                            
        } catch (\Exception $e) {
            // Redirect dengan error message jika gagal
            return redirect()->back()
                            ->with('error', 'Gagal menghapus anggota: ' . $e->getMessage());
        }
    }

    private function generateKodeAnggota()
    {
        $tahun = date('Y');
        $lastAnggota = Anggota::whereYear('created_at', $tahun)
                            ->orderBy('kode_anggota', 'desc')
                            ->first();
        
        if ($lastAnggota) {
            $lastNumber = intval(substr($lastAnggota->kode_anggota, -3));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return 'AGT-' . $tahun . '-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }
}