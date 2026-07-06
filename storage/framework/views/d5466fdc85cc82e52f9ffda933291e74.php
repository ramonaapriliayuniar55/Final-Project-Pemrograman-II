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
                        <i class="bi bi-file-earmark-bar-graph-fill text-primary"></i>
                        Laporan Transaksi Peminjaman
                    </h1>
                </div>

                
                <div class="card bg-light mb-4 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="<?php echo e(route('transaksi.laporan')); ?>" method="GET">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label font-semibold text-muted text-xs uppercase">Dari Tanggal</label>
                                    <input type="date" name="dari_tanggal" class="form-control" value="<?php echo e(request('dari_tanggal')); ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label font-semibold text-muted text-xs uppercase">Sampai Tanggal</label>
                                    <input type="date" name="sampai_tanggal" class="form-control" value="<?php echo e(request('sampai_tanggal')); ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label font-semibold text-muted text-xs uppercase">Status Buku</label>
                                    <select name="status" class="form-select">
                                        <option value="Semua" <?php echo e(request('status') == 'Semua' ? 'selected' : ''); ?>>Semua Status</option>
                                        <option value="Dipinjam" <?php echo e(request('status') == 'Dipinjam' ? 'selected' : ''); ?>>Dipinjam</option>
                                        <option value="Dikembalikan" <?php echo e(request('status') == 'Dikembalikan' ? 'selected' : ''); ?>>Dikembalikan</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label font-semibold text-muted text-xs uppercase">Anggota</label>
                                    <select name="anggota_id" class="form-select">
                                        <option value="">Semua Anggota</option>
                                        <?php $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($anggota->id); ?>" <?php echo e(request('anggota_id') == $anggota->id ? 'selected' : ''); ?>>
                                                <?php echo e($anggota->nama); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-funnel-fill"></i> Terapkan Filter
                                    </button>
                                    <a href="<?php echo e(route('transaksi.laporan')); ?>" class="btn btn-outline-secondary">Reset</a>
                                </div>
                                <a href="<?php echo e(route('transaksi.laporan.pdf', request()->all())); ?>" target="_blank" class="btn btn-danger px-4">
                                    <i class="bi bi-file-pdf-fill"></i> Export ke PDF
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card border-primary bg-light">
                            <div class="card-body">
                                <small class="text-muted text-uppercase d-block fw-semibold mb-1" style="font-size: 11px;">Total Transaksi</small>
                                <h2 class="m-0 fw-bold text-primary"><?php echo e($totalTransaksi); ?> Data</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-danger bg-light">
                            <div class="card-body">
                                <small class="text-muted text-uppercase d-block fw-semibold mb-1" style="font-size: 11px;">Total Denda</small>
                                <h2 class="m-0 fw-bold text-danger">Rp <?php echo e(number_format($totalDenda, 0, ',', '.')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Anggota</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Batas Kembali</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-end">Denda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><code><?php echo e($transaksi->kode_transaksi); ?></code></td>
                                        <td><?php echo e($transaksi->anggota->nama ?? '-'); ?></td>
                                        <td><?php echo e($transaksi->buku->judul ?? '-'); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($transaksi->tanggal_pinjam)->format('d M Y')); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($transaksi->tanggal_kembali)->format('d M Y')); ?></td>
                                        
                                        
                                        <td class="text-center">
                                            <?php echo $transaksi->status_badge; ?>

                                        </td>
                                        
                                        
                                        <td class="text-end fw-semibold">
                                            <?php if($transaksi->status == 'Dikembalikan'): ?>
                                                <span class="<?php echo e($transaksi->denda > 0 ? 'text-danger' : 'text-muted'); ?>">
                                                    Rp <?php echo e(number_format($transaksi->denda, 0, ',', '.')); ?>

                                                </span>
                                            <?php else: ?>
                                                <?php if($transaksi->terlambat > 0): ?>
                                                    <span class="text-danger fw-bold">
                                                        Rp <?php echo e(number_format($transaksi->terlambat * 5000, 0, ',', '.')); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-success">Rp 0</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center py-4 text-muted">Tidak ditemukan data transaksi.</td>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/transaksi/laporan.blade.php ENDPATH**/ ?>