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

    <div class="container-fluid py-4">

        <h2 class="mb-4">Hasil Pencarian</h2>

        <ul class="nav nav-tabs mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#tab-buku">
                    Buku (<?php echo e($results['buku']->count()); ?>)
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-anggota">
                    Anggota (<?php echo e($results['anggota']->count()); ?>)
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-transaksi">
                    Transaksi (<?php echo e($results['transaksi']->count()); ?>)
                </a>
            </li>
        </ul>

        <div class="tab-content">

            
            <div class="tab-pane fade show active" id="tab-buku">
                <?php $__empty_1 = true; $__currentLoopData = $results['buku']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <h6><?php echo str_ireplace($keyword, '<mark>'.$keyword.'</mark>', e($buku->judul)); ?></h6>
                            <small class="text-muted">
                                <?php echo e($buku->penulis); ?> — Stok: <?php echo e($buku->stok); ?>

                            </small>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted">Tidak ada buku yang cocok.</p>
                <?php endif; ?>
            </div>

            
            <div class="tab-pane fade" id="tab-anggota">
                <?php $__empty_1 = true; $__currentLoopData = $results['anggota']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <h6><?php echo str_ireplace($keyword, '<mark>'.$keyword.'</mark>', e($anggota->nama)); ?></h6>
                            <small class="text-muted">
                                <?php echo e($anggota->nim); ?> — <?php echo e($anggota->email); ?>

                            </small>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted">Tidak ada anggota yang cocok.</p>
                <?php endif; ?>
            </div>

            
            <div class="tab-pane fade" id="tab-transaksi">
                <?php $__empty_1 = true; $__currentLoopData = $results['transaksi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <h6><?php echo e($trx->kode_transaksi); ?></h6>
                            <small>
                                <?php echo e($trx->anggota->nama); ?> — <?php echo e($trx->buku->judul); ?>

                            </small>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted">Tidak ada transaksi yang cocok.</p>
                <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/search/index.blade.php ENDPATH**/ ?>