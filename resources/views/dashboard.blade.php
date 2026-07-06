<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h2 class="mb-4">Dashboard Perpustakaan</h2>

                {{-- Statistics Cards --}}
                <div class="row g-3 mb-4">
                    @foreach([
                        ['Total Buku', $stats['total_buku'], 'bi-book', 'primary'],
                        ['Anggota Aktif', $stats['total_anggota'], 'bi-people', 'success'],
                        ['Sedang Dipinjam', $stats['sedang_dipinjam'], 'bi-journal-arrow-up', 'info'],
                        ['Terlambat', $stats['terlambat'], 'bi-exclamation-triangle', 'danger'],
                        ['Transaksi Hari Ini', $stats['transaksi_hari_ini'], 'bi-calendar-check', 'warning'],
                        ['Buku Tersedia', $stats['buku_tersedia'], 'bi-bookshelf', 'secondary'],
                        ['Total Transaksi', $stats['total_transaksi'], 'bi-receipt', 'dark'],
                        ['Denda Bulan Ini', 'Rp ' . number_format($stats['denda_bulan_ini'], 0, ',', '.'), 'bi-cash', 'danger'],
                    ] as [$label, $value, $icon, $color])

                    <div class="col-xl-3 col-md-6">
                        <div class="card border-{{ $color }} h-100">
                            <div class="card-body d-flex align-items-center">
                                <i class="bi {{ $icon }} fs-1 text-{{ $color }} me-3"></i>
                                <div>
                                    <h6 class="text-muted mb-1">{{ $label }}</h6>
                                    <h4 class="mb-0">{{ $value }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                 {{-- Peringatan Keterlambatan --}}
                @if($terlambat->count() > 0)
                <div class="card border-danger shadow-sm mt-5 mb-4"
                    style="background-color:#fff5f7; border-radius:12px;">

                    <div class="card-header text-white"
                        style="background-color:#dc3545; border-radius:12px 12px 0 0;">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Peringatan Keterlambatan Pengembalian Buku</strong>
                    </div>

                    <div class="card-body py-4">

                        @foreach($terlambat as $item)

                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h6 class="fw-bold mb-1">
                                    {{ $item->anggota->nama }}
                                </h6>

                                <small class="text-secondary">
                                    <i class="bi bi-book me-1"></i>
                                    {{ $item->buku->judul }}
                                </small>
                            </div>

                            <span class="badge bg-danger rounded-pill px-3 py-2 fs-6">
                                {{ $item->terlambat }} Hari
                            </span>

                        </div>

                        @if(!$loop->last)
                            <hr class="my-3">
                        @endif

                        @endforeach

                    </div>

                </div>
                @endif

                {{-- Charts Row 1 --}}
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

                {{-- Charts Row 2 --}}
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

                {{-- Recent Transactions --}}
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
                                @foreach($recentTransaksi as $trx)
                                <tr>
                                    <td>{{ $trx->kode_transaksi }}</td>
                                    <td>{{ $trx->anggota->nama }}</td>
                                    <td>{{ $trx->buku->judul }}</td>
                                    <td>{{ $trx->tanggal_pinjam->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $trx->status === 'Dipinjam' ? 'warning' : 'success' }}">
                                            {{ $trx->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // 1. Line Chart — Trend Peminjaman 6 Bulan
    new Chart(document.getElementById('chartTrend'), {
        type: 'line',
        data: {
            labels: @json($chartData->pluck('bulan')),
            datasets: [
                {
                    label: 'Peminjaman',
                    data: @json($chartData->pluck('pinjam')),
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13,110,253,0.1)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Pengembalian',
                    data: @json($chartData->pluck('kembali')),
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
            labels: @json(array_keys($statusTransaksi)),
            datasets: [{
                data: @json(array_values($statusTransaksi)),
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
            labels: @json($kategoriBuku->pluck('kategori')),
            datasets: [{
                data: @json($kategoriBuku->pluck('total')),
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
            labels: @json($topBukuPopuler->pluck('judul')),
            datasets: [{
                label: 'Jumlah Dipinjam',
                data: @json($topBukuPopuler->pluck('transaksis_count')),
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
    @endpush
</x-app-layout>