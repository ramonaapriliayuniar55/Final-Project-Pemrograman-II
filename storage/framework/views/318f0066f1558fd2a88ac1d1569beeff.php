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

                
                <div class="d-flex justify-content-between align-items-center mb-4 border-b pb-3">
                    <h1 class="fs-3 fw-bold text-gray-800 m-0">
                        <i class="bi bi-info-circle-fill text-info"></i>
                        Detail Transaksi Peminjaman
                    </h1>
                    <span class="badge <?php echo e($transaksi->status == 'Dipinjam' ? 'bg-warning text-dark' : 'bg-success'); ?> fs-6 px-3 py-2">
                        <?php echo e($transaksi->status); ?>

                    </span>
                </div>

                <?php if($transaksi->status === 'Dipinjam'): ?>
                    <button type="button" class="btn btn-success" id="btn-kembalikan">
                        <i class="bi bi-arrow-return-left"></i> Kembalikan Buku
                    </button>
                
                    <form id="form-kembalikan" action="<?php echo e(route('transaksi.kembalikan', $transaksi->id)); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                    </form>
                <?php else: ?>
                    <?php if($transaksi->tanggal_dikembalikan <= $transaksi->tanggal_kembali): ?>
                        <div class="alert alert-success">
                            <i class="bi bi-check-circle"></i> Dikembalikan tepat waktu pada
                            <?php echo e($transaksi->tanggal_dikembalikan->format('d M Y')); ?>

                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i> Terlambat dikembalikan!
                            Denda: Rp <?php echo e(number_format($transaksi->denda, 0, ',', '.')); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php $__env->startPush('scripts'); ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                document.getElementById('btn-kembalikan')?.addEventListener('click', function() {
                    Swal.fire({
                        title: 'Konfirmasi Pengembalian',
                        text: 'Apakah Anda yakin ingin mengembalikan buku ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#198754',
                        confirmButtonText: 'Ya, Kembalikan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('form-kembalikan').submit();
                        }
                    });
                });
                </script>
                <?php $__env->stopPush(); ?>

                
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="auto-close-alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="auto-close-alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <table class="table table-borderless sm:text-sm">
                            <tr>
                                <th width="40%">Kode Transaksi</th>
                                <td>: <code><?php echo e($transaksi->kode_transaksi); ?></code></td>
                            </tr>
                            <tr>
                                <th>Nama Anggota</th>
                                <td>: <?php echo e($transaksi->anggota->nama ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Judul Buku</th>
                                <td>: <?php echo e($transaksi->buku->judul ?? '-'); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless sm:text-sm">
                            <tr>
                                <th width="40%">Tanggal Pinjam</th>
                                <td>: <?php echo e(is_root_obj($transaksi->tanggal_pinjam) ? $transaksi->tanggal_pinjam->format('d M Y') : \Carbon\Carbon::parse($transaksi->tanggal_pinjam)->format('d M Y')); ?></td>
                            </tr>
                            <tr>
                                <th>Batas Kembali</th>
                                <td>: <?php echo e(is_root_obj($transaksi->tanggal_kembali) ? $transaksi->tanggal_kembali->format('d M Y') : \Carbon\Carbon::parse($transaksi->tanggal_kembali)->format('d M Y')); ?></td>
                            </tr>
                            <?php if($transaksi->status == 'Dikembalikan'): ?>
                            <tr>
                                <th>Tanggal Dikembalikan</th>
                                <td>: <?php echo e(is_root_obj($transaksi->tanggal_dikembalikan) ? $transaksi->tanggal_dikembalikan->format('d M Y') : \Carbon\Carbon::parse($transaksi->tanggal_dikembalikan)->format('d M Y')); ?></td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>

                
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <h5 class="card-title fs-6 fw-bold text-secondary mb-2">Informasi Pengembalian & Perhitungan Denda</h5>
                        
                        <?php if($transaksi->status == 'Dikembalikan'): ?>
                            <p class="card-text text-muted mb-1">Status Pengembalian: <span class="text-success fw-bold">Buku Sudah Diterima</span></p>
                            <h3 class="text-danger fw-bold m-0">Total Denda: Rp <?php echo e(number_format($transaksi->denda, 0, ',', '.')); ?></h3>
                        <?php else: ?>
                            <?php if($transaksi->terlambat > 0): ?>
                                <div class="alert alert-danger m-0" role="alert">
                                    <i class="bi bi-exclamation-octagon-fill me-2"></i>
                                    <strong>Terlambat <?php echo e($transaksi->terlambat); ?> Hari!</strong> Estimasi denda saat ini sebesar: 
                                    <span class="fs-5 d-block mt-1 fw-bold">Rp <?php echo e(number_format($transaksi->terlambat * 5000, 0, ',', '.')); ?></span>
                                </div>
                            <?php else: ?>
                                <p class="text-success m-0 font-medium">
                                    <i class="bi bi-shield-check me-1"></i> Buku belum melewati batas pengembalian. Bebas denda!
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="d-flex gap-2 border-top pt-3">
                    <a href="<?php echo e(route('transaksi.index')); ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali Ke Daftar
                    </a>
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
<?php endif; ?>

<?php
// Helper pengecekan objek Carbon internal blade agar tidak crash
function is_root_obj($val) {
    return is_object($val) && method_exists($val, 'format');
}
?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertElement = document.getElementById('auto-close-alert');
        if (alertElement) {
            setTimeout(function() {
                if (typeof bootstrap !== 'undefined' && bootstrap.Alert) {
                    const bsAlert = new bootstrap.Alert(alertElement);
                    bsAlert.close();
                } else {
                    alertElement.classList.remove('show');
                    alertElement.classList.add('fade');
                    setTimeout(() => alertElement.remove(), 150);
                }
            }, 5000);
        }
    });
</script><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/transaksi/show.blade.php ENDPATH**/ ?>