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
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Daftar Buku')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>
                            <i class="bi bi-book"></i>
                            Daftar Buku
                        </h1>

                        <div class="d-flex justify-content-end gap-2 mb-3">
                            <a href="<?php echo e(route('buku.export')); ?>" class="btn btn-success">
                                <i class="bi bi-file-earmark-excel-fill"></i>
                                Export Excel
                            </a>
                            <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i>
                                Tambah Buku
                            </a>
                        </div>
                    </div>

                    
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="text-muted mb-1">Total Buku</h6>
                                            <h2 class="mb-0"><?php echo e($totalBuku); ?></h2>
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
                                            <h2 class="mb-0"><?php echo e($bukuTersedia); ?></h2>
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
                                            <h2 class="mb-0"><?php echo e($bukuHabis); ?></h2>
                                        </div>
                                        <div class="text-danger">
                                            <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="<?php echo e(route('buku.search')); ?>" method="GET">
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

                    
                    <form action="<?php echo e(route('buku.bulk-delete')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" id="select-all" class="form-check-input">
                                <label class="form-check-label">Pilih Semua</label>
                            </div>
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Hapus Terpilih
                            </button>
                        </div>

                        
                        <?php $__empty_1 = true; $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if (isset($component)) { $__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959 = $attributes; } ?>
<?php $component = App\View\Components\BukuCard::resolve(['buku' => $buku] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buku-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\BukuCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959)): ?>
<?php $attributes = $__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959; ?>
<?php unset($__attributesOriginal4ac845093cfe0dfa116a4a1a20b2d959); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959)): ?>
<?php $component = $__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959; ?>
<?php unset($__componentOriginal4ac845093cfe0dfa116a4a1a20b2d959); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="alert alert-info">
                                Tidak ada data buku
                            </div>
                        <?php endif; ?>

                        <?php if($bukus->count() > 0): ?>
                            <div class="text-center mt-4">
                                <p class="text-muted">
                                    Menampilkan <?php echo e($bukus->count()); ?> buku
                                    <?php if(isset($kategori)): ?>
                                        dari kategori <strong><?php echo e($kategori); ?></strong>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </form>

                </div>
            </div>
        </div>
    </div>


<?php $__env->startPush('scripts'); ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/buku/index.blade.php ENDPATH**/ ?>