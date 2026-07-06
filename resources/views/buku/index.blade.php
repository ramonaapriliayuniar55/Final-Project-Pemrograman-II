<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- HEADER HALAMAN & TOMBOL TAMBAH --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>
                            <i class="bi bi-book"></i>
                            Daftar Buku
                        </h1>

                        <div class="d-flex justify-content-end gap-2 mb-3">
                            <a href="{{ route('buku.export') }}" class="btn btn-success">
                                <i class="bi bi-file-earmark-excel-fill"></i>
                                Export Excel
                            </a>
                            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i>
                                Tambah Buku
                            </a>
                        </div>
                    </div>

                    {{-- STATISTIK CARDS --}}
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-muted mb-1">Total Buku</h6>
                                            <h2 class="mb-0">{{ $totalBuku }}</h2>
                                        </div>
                                        <div class="text-primary">
                                            <i class="bi bi-book-fill" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-success">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-muted mb-1">Buku Tersedia</h6>
                                            <h2 class="mb-0">{{ $bukuTersedia }}</h2>
                                        </div>
                                        <div class="text-success">
                                            <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-danger">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-muted mb-1">Buku Habis</h6>
                                            <h2 class="mb-0">{{ $bukuHabis }}</h2>
                                        </div>
                                        <div class="text-danger">
                                            <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FORM SEARCH --}}
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('buku.search') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="keyword" class="form-control" placeholder="Cari judul, pengarang, penerbit">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="kategori" class="form-select">
                                            <option value="">Semua Kategori</option>
                                            <option value="Programming">Programming</option>
                                            <option value="Database">Database</option>
                                            <option value="Web Design">Web Design</option>
                                            <option value="Networking">Networking</option>
                                            <option value="Data Science">Data Science</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="tahun" class="form-control" placeholder="Tahun">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="ketersediaan" class="form-select">
                                            <option value="">Semua</option>
                                            <option value="tersedia">Tersedia</option>
                                            <option value="habis">Habis</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-search"></i> Cari Buku
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- BULK DELETE FORM & DAFTAR BUKU --}}
                    <form action="{{ route('buku.bulk-delete') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="select-all" class="form-check-input">
                                <label class="form-check-label">Pilih Semua</label>
                            </div>
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Hapus Terpilih
                            </button>
                        </div>

                        {{-- DAFTAR BUKU COMPONENT --}}
                        @forelse ($bukus as $buku)
                            <x-buku-card :buku="$buku" />
                        @empty
                            <div class="alert alert-info">
                                Tidak ada data buku
                            </div>
                        @endforelse

                        @if ($bukus->count() > 0)
                            <div class="text-center mt-4">
                                <p class="text-muted">
                                    Menampilkan {{ $bukus->count() }} buku
                                    @isset($kategori)
                                        dari kategori <strong>{{ $kategori }}</strong>
                                    @endisset
                                </p>
                            </div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>

{{-- SCRIPTS --}}
@push('scripts')
<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && !this.classList.contains('delete-form')) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            }
        });
    });

    document.getElementById('select-all').addEventListener('change', function () {
        document.querySelectorAll('.book-checkbox').forEach(function (checkbox) {
            checkbox.checked = document.getElementById('select-all').checked;
        });
    });

    function hapusBuku(id, judul) {

    Swal.fire({
        title: 'Hapus Buku?',
        text: `Apakah Anda yakin ingin menghapus "${judul}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d'
    }).then((result) => {

        if (result.isConfirmed) {

            fetch(`/buku/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {

                if (data.success) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });

                } else {

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.message
                    });

                }

            });

        }

    });

}
    // Tampilkan pesan sukses setelah reload (kalau ada)
document.addEventListener('DOMContentLoaded', function () {
    const msg = sessionStorage.getItem('flashMessage');
    if (msg) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: msg,
            timer: 5000,
            timerProgressBar: true,
            confirmButtonText: 'OK',
        });
        sessionStorage.removeItem('flashMessage');
    }
});
</script>
@endpush
</x-app-layout>