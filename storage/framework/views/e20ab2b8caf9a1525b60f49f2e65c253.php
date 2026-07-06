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
    <div class="container py-4">

        <div class="card shadow-sm border-0">

            
            <div class="card-header bg-warning">
                <h2 class="mb-0">
                    <i class="bi bi-pencil-square"></i>
                    Edit Transaksi: <?php echo e($transaksi->kode_transaksi); ?>

                </h2>
            </div>

            <div class="card-body">

                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('transaksi.update', $transaksi->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="row">

                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Anggota</label>
                            <input type="text"
                                   class="form-control bg-light"
                                   value="<?php echo e($transaksi->anggota->nama); ?>"
                                   readonly>
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Buku</label>
                            <input type="text"
                                   class="form-control bg-light"
                                   value="<?php echo e($transaksi->buku->judul); ?>"
                                   readonly>
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Tanggal Pinjam <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                   name="tanggal_pinjam"
                                   class="form-control"
                                   value="<?php echo e(old('tanggal_pinjam', $transaksi->tanggal_pinjam->format('Y-m-d'))); ?>"
                                   required>
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Tanggal Kembali <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                   name="tanggal_kembali"
                                   class="form-control"
                                   value="<?php echo e(old('tanggal_kembali', $transaksi->tanggal_kembali->format('Y-m-d'))); ?>"
                                   required>
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>

                            <select name="status" class="form-select">
                                <option value="Dipinjam"
                                    <?php echo e($transaksi->status == 'Dipinjam' ? 'selected' : ''); ?>>
                                    Dipinjam
                                </option>

                                <option value="Dikembalikan"
                                    <?php echo e($transaksi->status == 'Dikembalikan' ? 'selected' : ''); ?>>
                                    Dikembalikan
                                </option>
                            </select>
                        </div>

                        
                        <div class="col-12 mb-3">
                            <label class="form-label">Keterangan</label>

                            <textarea name="keterangan"
                                      rows="4"
                                      class="form-control"><?php echo e(old('keterangan', $transaksi->keterangan)); ?></textarea>
                        </div>

                    </div>

                    
                    <div class="d-flex justify-content-between mt-3">

                        <a href="<?php echo e(route('transaksi.index')); ?>"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>

                        <button type="submit"
                                class="btn btn-warning">
                            <i class="bi bi-save"></i>
                            Update Transaksi
                        </button>

                    </div>

                </form>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/transaksi/edit.blade.php ENDPATH**/ ?>