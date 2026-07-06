<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="fs-3 fw-bold text-gray-800 m-0">
                        <i class="bi bi-arrow-left-right"></i>
                        Daftar Transaksi Peminjaman
                    </h1>
                    <div class="d-flex gap-2">
                        
                        <a href="<?php echo e(route('transaksi.laporan')); ?>" class="btn btn-success text-white">
                            <i class="bi bi-file-earmark-bar-graph-fill"></i> Lihat Laporan
                        </a>
                        <a href="<?php echo e(route('transaksi.create')); ?>" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Pinjam Buku
                        </a>
                    </div>
                </div>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                
                <div class="row mb-4 g-3">
                    <div class="col-md-4">
                        <div class="card border-primary h-100">
                            <div class="card-body">
                                <h6 class="text-muted">Total Transaksi</h6>
                                <h2><?php echo e($transaksis->count()); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning h-100">
                            <div class="card-body">
                                <h6 class="text-muted">Sedang Dipinjam</h6>
                                <h2><?php echo e($transaksis->where('status', 'Dipinjam')->count()); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-success h-100">
                            <div class="card-body">
                                <h6 class="text-muted">Sudah Dikembalikan</h6>
                                <h2><?php echo e($transaksis->where('status', 'Dikembalikan')->count()); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <form method="GET" action="<?php echo e(route('transaksi.index')); ?>" class="row g-2 mb-4">
                    <div class="col-md-5">
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari kode transaksi, nama anggota, atau judul buku..."
                               value="<?php echo e(request('search')); ?>">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="Semua" <?php echo e(!request('status') || request('status') == 'Semua' ? 'selected' : ''); ?>>Semua Status</option>
                            <option value="Dipinjam" <?php echo e(request('status') == 'Dipinjam' ? 'selected' : ''); ?>>Dipinjam</option>
                            <option value="Dikembalikan" <?php echo e(request('status') == 'Dikembalikan' ? 'selected' : ''); ?>>Dikembalikan</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo e(route('transaksi.index')); ?>" class="btn btn-outline-secondary w-100">
                            <i class="bi bi-x-circle"></i> Reset
                        </a>
                    </div>
                </form>

                
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Anggota</th>
                                        <th>Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><code><?php echo e($transaksi->kode_transaksi); ?></code></td>
                                        <td><?php echo e($transaksi->anggota->nama); ?></td>
                                        <td><?php echo e($transaksi->buku->judul); ?></td>
                                        <td><?php echo e($transaksi->tanggal_pinjam->format('d M Y')); ?></td>
                                        <td><?php echo e($transaksi->tanggal_kembali->format('d M Y')); ?></td>

                                        <td>
                                            <?php if($transaksi->status == 'Dipinjam'): ?>
                                                <span class="badge bg-warning text-dark px-2.5 py-1.5 rounded">Dipinjam</span>

                                                
                                                <?php if(\Carbon\Carbon::now()->startOfDay()->gt(\Carbon\Carbon::parse($transaksi->tanggal_kembali)->startOfDay())): ?>
                                                    <span class="badge bg-danger d-block mt-1">
                                                        Terlambat <?php echo e(\Carbon\Carbon::parse($transaksi->tanggal_kembali)->startOfDay()->diffInDays(\Carbon\Carbon::now()->startOfDay(), true)); ?> Hari
                                                    </span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="badge bg-success px-2.5 py-1.5 rounded">Dikembalikan</span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="<?php echo e(route('transaksi.show', $transaksi->id)); ?>"
                                                   class="btn btn-sm btn-info text-white" title="Lihat">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="<?php echo e(route('transaksi.edit', $transaksi->id)); ?>"
                                                   class="btn btn-sm btn-warning text-white" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="<?php echo e(route('transaksi.destroy', $transaksi->id)); ?>" method="POST" class="form-hapus-transaksi m-0">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            Belum ada transaksi
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.form-hapus-transaksi').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Transaksi ini akan dihapus permanen dan tidak bisa dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

<?php if(session('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: <?php echo json_encode(session('success'), 15, 512) ?>,
        timer: 2000,
        showConfirmButton: false
    });
</script>
<?php endif; ?>

<?php if(session('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: <?php echo json_encode(session('error'), 15, 512) ?>
    });
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/transaksi/index.blade.php ENDPATH**/ ?>