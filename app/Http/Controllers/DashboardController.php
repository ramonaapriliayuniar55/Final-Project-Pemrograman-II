<?php
 
namespace App\Http\Controllers;
 
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
 
class DashboardController extends Controller
{
    public function index()
    {
        // Statistik utama
        $stats = [
            'total_buku'        => Buku::count(),
            'total_anggota'     => Anggota::where('status', 'Aktif')->count(),
            'total_transaksi'   => Transaksi::count(),
            'sedang_dipinjam'   => Transaksi::where('status', 'Dipinjam')->count(),
            'terlambat'         => Transaksi::where('status', 'Dipinjam')
                                            ->where('tanggal_kembali', '<', now())->count(),
            'denda_bulan_ini'   => Transaksi::whereMonth('tanggal_dikembalikan', now()->month)
                                            ->sum('denda'),
            'transaksi_hari_ini'=> Transaksi::whereDate('tanggal_pinjam', today())->count(),
            'buku_tersedia'     => Buku::where('stok', '>', 0)->count(),
        ];
 
        // Data chart: transaksi 6 bulan terakhir (Line Chart Trend Peminjaman)
        $chartData = collect(range(5, 0))->map(function ($i) {
            $date = now()->subMonths($i);
            return [
                'bulan' => $date->translatedFormat('M Y'),
                'pinjam' => Transaksi::whereMonth('tanggal_pinjam', $date->month)
                                     ->whereYear('tanggal_pinjam', $date->year)->count(),
                'kembali' => Transaksi::whereMonth('tanggal_dikembalikan', $date->month)
                                      ->whereYear('tanggal_dikembalikan', $date->year)->count(),
            ];
        });
 
        // Top 10 buku terpopuler (Bar Chart)
        $topBukuPopuler = Buku::withCount('transaksis')
                           ->orderByDesc('transaksis_count')
                           ->take(10)->get();
 
        // Kategori buku (Pie Chart)
        $kategoriBuku = Buku::select('kategori', DB::raw('count(*) as total'))
                             ->groupBy('kategori')
                             ->get();
 
        // Status transaksi (Donut Chart)
        $statusTransaksi = [
            'Dipinjam'      => Transaksi::where('status', 'Dipinjam')->count(),
            'Dikembalikan'  => Transaksi::where('status', 'Dikembalikan')->count(),
        ];
 
        // Top 5 anggota aktif
        $anggotaAktif = Anggota::withCount('transaksis')
                               ->orderByDesc('transaksis_count')
                               ->take(5)->get();
 
        // Transaksi terbaru
        $recentTransaksi = Transaksi::with(['anggota', 'buku'])
                                    ->latest()->take(5)->get();

        $terlambat = Transaksi::with(['anggota', 'buku'])
    ->where('status', 'Dipinjam')
    ->whereDate('tanggal_kembali', '<', now())
    ->orderBy('tanggal_kembali')
    ->take(5)
    ->get();

return view('dashboard', compact(
    'stats',
    'chartData',
    'topBukuPopuler',
    'kategoriBuku',
    'statusTransaksi',
    'anggotaAktif',
    'recentTransaksi',
    'terlambat'
));
    }
}