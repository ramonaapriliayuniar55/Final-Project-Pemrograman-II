<x-app-layout>
    <div class="container py-4">

        <div class="card shadow-sm border-0">

            {{-- Header --}}
            <div class="card-header bg-warning">
                <h2 class="mb-0">
                    <i class="bi bi-pencil-square"></i>
                    Edit Transaksi: {{ $transaksi->kode_transaksi }}
                </h2>
            </div>

            <div class="card-body">

                {{-- Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Anggota --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Anggota</label>
                            <input type="text"
                                   class="form-control bg-light"
                                   value="{{ $transaksi->anggota->nama }}"
                                   readonly>
                        </div>

                        {{-- Buku --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Buku</label>
                            <input type="text"
                                   class="form-control bg-light"
                                   value="{{ $transaksi->buku->judul }}"
                                   readonly>
                        </div>

                        {{-- Tanggal Pinjam --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Tanggal Pinjam <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                   name="tanggal_pinjam"
                                   class="form-control"
                                   value="{{ old('tanggal_pinjam', $transaksi->tanggal_pinjam->format('Y-m-d')) }}"
                                   required>
                        </div>

                        {{-- Tanggal Kembali --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Tanggal Kembali <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                   name="tanggal_kembali"
                                   class="form-control"
                                   value="{{ old('tanggal_kembali', $transaksi->tanggal_kembali->format('Y-m-d')) }}"
                                   required>
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>

                            <select name="status" class="form-select">
                                <option value="Dipinjam"
                                    {{ $transaksi->status == 'Dipinjam' ? 'selected' : '' }}>
                                    Dipinjam
                                </option>

                                <option value="Dikembalikan"
                                    {{ $transaksi->status == 'Dikembalikan' ? 'selected' : '' }}>
                                    Dikembalikan
                                </option>
                            </select>
                        </div>

                        {{-- Keterangan --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Keterangan</label>

                            <textarea name="keterangan"
                                      rows="4"
                                      class="form-control">{{ old('keterangan', $transaksi->keterangan) }}</textarea>
                        </div>

                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between mt-3">

                        <a href="{{ route('transaksi.index') }}"
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
</x-app-layout>