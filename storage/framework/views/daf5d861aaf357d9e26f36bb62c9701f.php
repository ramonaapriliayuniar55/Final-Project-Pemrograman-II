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
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h2 class="mb-4">Dashboard Perpustakaan</h2>

                
                <div class="row g-3 mb-4">
                    <?php $__currentLoopData = [
                        ['Total Buku', $stats['total_buku'], 'bi-book', 'primary'],
                        ['Anggota Aktif', $stats['total_anggota'], 'bi-people', 'success'],
                        ['Sedang Dipinjam', $stats['sedang_dipinjam'], 'bi-journal-arrow-up', 'info'],
                        ['Terlambat', $stats['terlambat'], 'bi-exclamation-triangle', 'danger'],
                        ['Transaksi Hari Ini', $stats['transaksi_hari_ini'], 'bi-calendar-check', 'warning'],
                        ['Buku Tersedia', $stats['buku_tersedia'], 'bi-bookshelf', 'secondary'],
                        ['Total Transaksi', $stats['total_transaksi'], 'bi-receipt', 'dark'],
                        ['Denda Bulan Ini', 'Rp ' . number_format($stats['denda_bulan_ini'], 0, ',', '.'), 'bi-cash', 'danger'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value, $icon, $color]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-xl-3 col-md-6">
                        <div class="card border-<?php echo e($color); ?> h-100">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi <?php echo e($icon); ?> fs-1 text-<?php echo e($color); ?> me-3"></i>
                                <div>
                                    <h6 class="text-muted mb-1"><?php echo e($label); ?></h6>
                                    <h4 class="mb-0"><?php echo e($value); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                 
                <?php if($terlambat->count() > 0): ?>
                <div class="card border-danger shadow-sm mt-5 mb-4"
                    style="background-color:#fff5f7; border-radius:12px;">

                    <div class="card-header text-white"
                        style="background-color:#dc3545; border-radius:12px 12px 0 0;">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Peringatan Keterlambatan Pengembalian Buku</strong>
                    </div>

                    <div class="card-body py-4">

                        <?php $__currentLoopData = $terlambat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h6 class="fw-bold mb-1">
                                    <?php echo e($item->anggota->nama); ?>

                                </h6>

                                <small class="text-secondary">
                                    <i class="bi bi-book me-1"></i>
                                    <?php echo e($item->buku->judul); ?>

                                </small>
                            </div>

                            <span class="badge bg-danger rounded-pill px-3 py-2 fs-6">
                                <?php echo e($item->terlambat); ?> Hari
                            </span>

                        </div>

                        <?php if(!$loop->last): ?>
                            <hr class="my-3">
                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                </div>
                <?php endif; ?>

                
                <div class="row mb-4 g-3">
                    <div class="col-lg-8">
                        <div class="card h-100">
                            <div class="card-header">Trend Peminjaman 6 Bulan Terakhir</div>
                            <div class="card-body">
                                <div style="position: relative; height: 320px;">
                                    <canvas id="chartTrend"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-header">Status Transaksi</div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div style="position: relative; height: 320px; width: 100%;">
                                    <canvas id="chartStatus"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row mb-4 g-3">
                    <div class="col-lg-4">
                        <div class="card h-100">
                            <div class="card-header">Kategori Buku</div>
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <div style="position: relative; height: 320px; width: 100%;">
                                    <canvas id="chartKategori"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card h-100">
                            <div class="card-header">Top 10 Buku Terpopuler</div>
                            <div class="card-body">
                                <div style="position: relative; height: 320px;">
                                    <canvas id="chartTopBuku"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="card">
                    <div class="card-header">Transaksi Terbaru</div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Anggota</th>
                                    <th>Buku</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $recentTransaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($trx->kode_transaksi); ?></td>
                                    <td><?php echo e($trx->anggota->nama); ?></td>
                                    <td><?php echo e($trx->buku->judul); ?></td>
                                    <td><?php echo e($trx->tanggal_pinjam->format('d/m/Y')); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo e($trx->status === 'Dipinjam' ? 'warning' : 'success'); ?>">
                                            <?php echo e($trx->status); ?>

                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // 1. Line Chart — Trend Peminjaman 6 Bulan
    new Chart(document.getElementById('chartTrend'), {
        type: 'line',
        data: {
            labels: <?php echo json_encode($chartData->pluck('bulan'), 15, 512) ?>,
            datasets: [
                {
                    label: 'Peminjaman',
                    data: <?php echo json_encode($chartData->pluck('pinjam'), 15, 512) ?>,
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13,110,253,0.1)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Pengembalian',
                    data: <?php echo json_encode($chartData->pluck('kembali'), 15, 512) ?>,
                    borderColor: '#198754',
                    backgroundColor: 'rgba(25,135,84,0.1)',
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // 2. Donut Chart — Status Transaksi
    new Chart(document.getElementById('chartStatus'), {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode(array_keys($statusTransaksi), 15, 512) ?>,
            datasets: [{
                data: <?php echo json_encode(array_values($statusTransaksi), 15, 512) ?>,
                backgroundColor: ['#ffc107', '#198754']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // 3. Pie Chart — Kategori Buku
    new Chart(document.getElementById('chartKategori'), {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($kategoriBuku->pluck('kategori'), 15, 512) ?>,
            datasets: [{
                data: <?php echo json_encode($kategoriBuku->pluck('total'), 15, 512) ?>,
                backgroundColor: [
                    '#0d6efd', '#198754', '#ffc107', '#dc3545',
                    '#6f42c1', '#20c997', '#fd7e14', '#6c757d'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // 4. Bar Chart — Top 10 Buku Terpopuler
    new Chart(document.getElementById('chartTopBuku'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($topBukuPopuler->pluck('judul'), 15, 512) ?>,
            datasets: [{
                label: 'Jumlah Dipinjam',
                data: <?php echo json_encode($topBukuPopuler->pluck('transaksis_count'), 15, 512) ?>,
                backgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            plugins: { legend: { display: false } },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/dashboard.blade.php ENDPATH**/ ?>