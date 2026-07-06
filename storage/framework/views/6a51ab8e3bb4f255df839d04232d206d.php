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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="h4 mb-0 text-gray-800">
                <?php echo e($buku->judul); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        
        
        <div class="row">
            <div class="col-12 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('buku.index')); ?>">Buku</a></li>
                        <li class="breadcrumb-item active"><?php echo e($buku->judul); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
     
        <div class="row">
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 fs-5 py-1">
                            <i class="bi bi-book text-white"></i> Detail Buku
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <h2 class="mb-3 h3 fw-bold text-gray-800"><?php echo e($buku->judul); ?></h2>
                        
                        
                        <div class="mb-4">
                            <span class="badge bg-<?php echo e($buku->kategori == 'Programming' ? 'primary' : ($buku->kategori == 'Database' ? 'success' : ($buku->kategori == 'Web Design' ? 'info' : ($buku->kategori == 'Networking' ? 'warning' : 'danger')))); ?> fs-6 px-3 py-2">
                                <i class="bi bi-tag"></i> <?php echo e($buku->kategori); ?>

                            </span>
                        </div>
                        
                        
                        <table class="table table-borderless align-middle">
                            <tr>
                                <td width="200" class="fw-bold text-muted">
                                    <i class="bi bi-upc text-primary"></i> Kode Buku
                                </td>
                                <td>: <?php echo e($buku->kode_buku); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-muted">
                                    <i class="bi bi-person text-primary"></i> Pengarang
                                </td>
                                <td>: <?php echo e($buku->pengarang); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-muted">
                                    <i class="bi bi-building text-primary"></i> Penerbit
                                </td>
                                <td>: <?php echo e($buku->penerbit); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-muted">
                                    <i class="bi bi-calendar text-primary"></i> Tahun Terbit
                                </td>
                                <td>: <?php echo e($buku->tahun_terbit); ?></td>
                            </tr>
                            <?php if($buku->isbn): ?>
                                <tr>
                                    <td class="fw-bold text-muted">
                                        <i class="bi bi-hash text-primary"></i> ISBN
                                    </td>
                                    <td>: <?php echo e($buku->isbn); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="fw-bold text-muted">
                                    <i class="bi bi-translate text-primary"></i> Bahasa
                                </td>
                                <td>: <?php echo e($buku->bahasa); ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-muted">
                                    <i class="bi bi-cash text-primary"></i> Harga
                                </td>
                                <td>: <span class="text-success fs-5 fw-bold"><?php echo e($buku->harga_format); ?></span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-muted">
                                    <i class="bi bi-boxes text-primary"></i> Stok
                                </td>
                                <td>
                                    : <span class="fw-bold"><?php echo e($buku->stok); ?></span> buku
                                    <?php if($buku->stok > 0): ?>
                                        <span class="badge bg-success ms-2 px-2 py-1">
                                            <i class="bi bi-check-circle"></i> Tersedia
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-danger ms-2 px-2 py-1">
                                            <i class="bi bi-x-circle"></i> Habis
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                        
                        
                        <?php if($buku->deskripsi): ?>
                            <hr class="my-4">
                            <h5 class="fw-bold text-gray-700 mb-2"><i class="bi bi-file-text text-primary"></i> Deskripsi</h5>
                            <p class="text-justify text-secondary leading-relaxed"><?php echo e($buku->deskripsi); ?></p>
                        <?php else: ?>
                            <hr class="my-4">
                            <p class="text-muted fst-italic mb-0">
                                <i class="bi bi-info-circle"></i> Tidak ada deskripsi untuk buku ini
                            </p>
                        <?php endif; ?>

                        
                        <hr class="my-4">
                        <div class="row text-muted small">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <i class="bi bi-clock"></i> 
                                Ditambahkan: 
                                <?php echo e($buku->created_at ? $buku->created_at->format('d M Y H:i') : '-'); ?>

                            </div>

                            <div class="col-md-6 text-md-end">
                                <i class="bi bi-clock-history"></i> 
                                Terakhir Update: 
                                <?php echo e($buku->updated_at ? $buku->updated_at->format('d M Y H:i') : '-'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
            <div class="col-md-4">
                
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h6 class="mb-0 py-1 fw-bold">
                            <i class="bi bi-gear text-white"></i> Aksi
                        </h6>
                    </div>
                    <div class="card-body d-grid gap-2 p-3">
                        <a href="<?php echo e(route('buku.edit', $buku->id)); ?>" class="btn btn-warning py-2 text-dark fw-medium">
                            <i class="bi bi-pencil"></i> Edit Buku
                        </a>
                        
                        <?php if($buku->stok > 0): ?>
                            <button class="btn btn-success py-2 fw-medium">
                                <i class="bi bi-cart-plus"></i> Pinjam Buku
                            </button>
                        <?php else: ?>
                            <button class="btn btn-secondary py-2" disabled>
                                <i class="bi bi-x-circle"></i> Stok Habis
                            </button>
                        <?php endif; ?>
                        
                        <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-outline-primary py-2 fw-medium">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        
                        <form action="<?php echo e(route('buku.destroy', $buku->id)); ?>" 
                            method="POST" 
                            class="d-inline delete-form">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="button" class="btn btn-danger w-100 py-2 fw-medium btn-delete" 
                                    data-judul="<?php echo e($buku->judul); ?>">
                                <i class="bi bi-trash"></i> Hapus Buku
                            </button>
                        </form>
                        
                        <?php $__env->startPush('scripts'); ?>
                        <script>
                            document.querySelectorAll('.btn-delete').forEach(button => {
                                button.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    const form = this.closest('form');
                                    const judul = this.getAttribute('data-judul');
                                    
                                    Swal.fire({
                                        title: 'Konfirmasi Hapus',
                                        text: `Apakah Anda yakin ingin menghapus buku "${judul}"?`,
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Ya, Hapus!',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            form.submit();
                                        }
                                    });
                                });
                            });
                        </script>
                        <?php $__env->stopPush(); ?>

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
                        </script>
                        <?php $__env->stopPush(); ?>
                    </div>
                </div>
                
                
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h6 class="mb-0 py-1 fw-bold">
                            <i class="bi bi-info-circle text-white"></i> Status Stok
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <?php if($buku->stok == 0): ?>
                            <div class="alert alert-danger mb-0 border-0 shadow-sm">
                                <i class="bi bi-exclamation-triangle"></i>
                                <strong>Stok Habis!</strong><br />
                                Buku ini sedang tidak tersedia.
                            </div>
                        <?php elseif($buku->stok <= 5): ?>
                            <div class="alert alert-warning mb-0 border-0 shadow-sm">
                                <i class="bi bi-exclamation-circle"></i>
                                <strong>Stok Menipis!</strong><br />
                                Tersisa <?php echo e($buku->stok); ?> buku.
                            </div>
                        <?php else: ?>
                            <div class="alert alert-success mb-0 border-0 shadow-sm">
                                <i class="bi bi-check-circle"></i>
                                <strong>Stok Aman!</strong><br />
                                Tersedia <?php echo e($buku->stok); ?> buku.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h6 class="mb-0 py-1 fw-bold">
                            <i class="bi bi-collection text-white"></i> Buku Serupa
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <?php
                            $bukuSerupa = App\Models\Buku::where('kategori', $buku->kategori)
                                                          ->where('id', '!=', $buku->id)
                                                          ->take(3)
                                                          ->get();
                        ?>
                        
                        <?php $__empty_1 = true; $__currentLoopData = $bukuSerupa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="mb-2 p-2 rounded hover:bg-light transition-all">
                                <a href="<?php echo e(route('buku.show', $item->id)); ?>" class="text-decoration-none">
                                    <h6 class="mb-1 text-primary fw-medium small"><?php echo e(Str::limit($item->judul, 40)); ?></h6>
                                </a>
                                <small class="text-muted d-block"><i class="bi bi-person"></i> <?php echo e($item->pengarang); ?></small>
                            </div>
                            <?php if(!$loop->last): ?>
                                <hr class="my-2 opacity-50">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-muted small mb-0 py-2 text-center">
                                <i class="bi bi-info-circle"></i> Tidak ada buku serupa
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/buku/show.blade.php ENDPATH**/ ?>