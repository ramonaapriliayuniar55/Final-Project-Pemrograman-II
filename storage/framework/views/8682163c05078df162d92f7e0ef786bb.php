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

                
                <div class="row">
                    <div class="col-12 mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active"><?php echo e($anggota->nama); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-8 mb-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h4 class="mb-0">
                                    <i class="bi bi-person"></i>
                                    Detail Anggota
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <?php if($anggota->jenis_kelamin == 'Laki-laki'): ?>
                                        <i class="bi bi-person-circle text-primary" style="font-size: 5rem;"></i>
                                    <?php else: ?>
                                        <i class="bi bi-person-circle text-danger" style="font-size: 5rem;"></i>
                                    <?php endif; ?>
                                    <h3 class="mt-2"><?php echo e($anggota->nama); ?></h3>
                                    <?php if($anggota->status == 'Aktif'): ?>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Anggota Aktif
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle"></i> Nonaktif
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <table class="table table-borderless">
                                    <tr>
                                        <td width="200" class="fw-bold">
                                            <i class="bi bi-upc text-success"></i> Kode Anggota
                                        </td>
                                        <td>: <code><?php echo e($anggota->kode_anggota); ?></code></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <i class="bi bi-envelope text-success"></i> Email
                                        </td>
                                        <td>: <?php echo e($anggota->email); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <i class="bi bi-telephone text-success"></i> Telepon
                                        </td>
                                        <td>: <?php echo e($anggota->telepon); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <i class="bi bi-geo-alt text-success"></i> Alamat
                                        </td>
                                        <td>: <?php echo e($anggota->alamat); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <i class="bi bi-calendar text-success"></i> Tanggal Lahir
                                        </td>
                                        <td>: <?php echo e($anggota->tanggal_lahir?->format('d F Y')); ?> (<?php echo e($anggota->umur); ?> tahun)</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <i class="bi bi-gender-ambiguous text-success"></i> Jenis Kelamin
                                        </td>
                                        <td>: <?php echo e($anggota->jenis_kelamin); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <i class="bi bi-briefcase text-success"></i> Pekerjaan
                                        </td>
                                        <td>: <?php echo e($anggota->pekerjaan ?? '-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">
                                            <i class="bi bi-calendar-check text-success"></i> Tanggal Daftar
                                        </td>
                                        <td>: <?php echo e($anggota->tanggal_daftar?->format('d F Y')); ?> (<?php echo e($anggota->lama_anggota); ?> hari)</td>
                                    </tr>
                                </table>

                                <hr>
                                <div class="row text-muted small">
                                    <div class="col-md-6 mb-2 mb-md-0">
                                        <i class="bi bi-clock"></i>
                                        Ditambahkan: <?php echo e($anggota->created_at?->format('d M Y H:i')); ?>

                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <i class="bi bi-clock-history"></i>
                                        Terakhir Update: <?php echo e($anggota->updated_at?->format('d M Y H:i')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header bg-secondary text-white">
                                <h6 class="mb-0">
                                    <i class="bi bi-gear"></i> Aksi
                                </h6>
                            </div>
                            <div class="card-body d-grid gap-2">
                                <a href="<?php echo e(route('anggota.edit', $anggota->id)); ?>" class="btn btn-warning text-dark fw-bold">
                                    <i class="bi bi-pencil"></i> Edit Anggota
                                </a>
                                <a href="<?php echo e(route('anggota.index')); ?>" class="btn btn-outline-success">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <hr>
                                <form action="<?php echo e(route('anggota.destroy', $anggota->id)); ?>"
                                method="POST"
                                class="form-hapus"
                                data-nama="<?php echo e($anggota->nama); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="bi bi-trash"></i> Hapus Anggota
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <i class="bi bi-clock-history"></i> Riwayat Peminjaman
                                </h5>
                            </div>
                            <div class="card-body">

                                
                                <div class="row g-2 mb-3">
                                    <div class="col-md-3 col-6">
                                        <div class="card border-primary text-center">
                                            <div class="card-body py-2 px-2">
                                                <div class="text-muted small">Total Pinjam</div>
                                                <div class="fs-5 fw-bold"><?php echo e($statistikPeminjaman['total_pinjam']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border-warning text-center">
                                            <div class="card-body py-2 px-2">
                                                <div class="text-muted small">Sedang Dipinjam</div>
                                                <div class="fs-5 fw-bold"><?php echo e($statistikPeminjaman['sedang_dipinjam']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border-success text-center">
                                            <div class="card-body py-2 px-2">
                                                <div class="text-muted small">Sudah Dikembalikan</div>
                                                <div class="fs-5 fw-bold"><?php echo e($statistikPeminjaman['sudah_dikembalikan']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="card border-danger text-center">
                                            <div class="card-body py-2 px-2">
                                                <div class="text-muted small">Total Denda</div>
                                                <div class="fs-6 fw-bold">Rp <?php echo e(number_format($statistikPeminjaman['total_denda'], 0, ',', '.')); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <form method="GET" action="<?php echo e(route('anggota.show', $anggota->id)); ?>" class="row g-2 mb-4">
                                    <div class="col-md-3">
                                        <select name="status" class="form-select" onchange="this.form.submit()">
                                            <option value="Semua" <?php echo e(!request('status') || request('status') == 'Semua' ? 'selected' : ''); ?>>Semua Status</option>
                                            <option value="Dipinjam" <?php echo e(request('status') == 'Dipinjam' ? 'selected' : ''); ?>>Dipinjam</option>
                                            <option value="Dikembalikan" <?php echo e(request('status') == 'Dikembalikan' ? 'selected' : ''); ?>>Dikembalikan</option>
                                        </select>
                                    </div>
                                </form>

                                
                                <?php $__empty_1 = true; $__currentLoopData = $riwayatTransaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="d-flex mb-3 pb-3 <?php echo e(!$loop->last ? 'border-bottom' : ''); ?>">
                                    <div class="me-3">
                                        <?php if($trx->status == 'Dipinjam'): ?>
                                            <span class="badge bg-warning rounded-circle p-2"><i class="bi bi-journal-arrow-up"></i></span>
                                        <?php else: ?>
                                            <span class="badge bg-success rounded-circle p-2"><i class="bi bi-check-lg"></i></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1"><?php echo e($trx->buku->judul); ?></h6>
                                            <span class="badge bg-<?php echo e($trx->status == 'Dipinjam' ? 'warning' : 'success'); ?>">
                                                <?php echo e($trx->status); ?>

                                            </span>
                                        </div>
                                        <div class="text-muted small">
                                            <code><?php echo e($trx->kode_transaksi); ?></code>
                                            &bull; Pinjam: <?php echo e($trx->tanggal_pinjam->format('d M Y')); ?>

                                            &bull; Kembali: <?php echo e($trx->tanggal_kembali->format('d M Y')); ?>

                                            <?php if($trx->denda > 0): ?>
                                                &bull; <span class="text-danger">Denda: Rp <?php echo e(number_format($trx->denda, 0, ',', '.')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-muted text-center mb-0">Belum ada riwayat peminjaman.</p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
<script>
document.querySelector('.form-hapus')?.addEventListener('submit', function(e){

    e.preventDefault();

    Swal.fire({
        title: 'Hapus Anggota?',
        html: `Apakah Anda yakin ingin menghapus anggota <b>${this.dataset.nama}</b>?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d'
    }).then((result)=>{

        if(result.isConfirmed){
            this.submit();
        }

    });

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/anggota/show.blade.php ENDPATH**/ ?>