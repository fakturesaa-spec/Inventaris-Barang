@extends('layouts.barang')

@section('content')
    <div class="container-fluid px-3 px-lg-4 py-4">
        <div class="page-heading mb-4">
            <div class="page-heading-copy">
                <span class="page-icon"><i class="bi bi-clipboard-plus" aria-hidden="true"></i></span>
                <div>
                    <p class="eyebrow mb-1">Peminjaman</p>
                    <h1 class="h3 mb-1">Tambah Peminjaman</h1>
                    <p class="text-muted mb-0">Catat barang yang dipinjam dan informasi peminjam.</p>
                </div>
            </div>
        </div>

        <form class="panel" method="POST" action="{{ route('peminjaman.store') }}">
            @csrf

            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-pencil-square" aria-hidden="true"></i><span>Detail Peminjaman</span></h2>
                    <p class="text-muted mb-0">Lengkapi data peminjaman sebelum menyimpan.</p>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="barang_id">Barang</label>
                    <select class="form-select @error('barang_id') is-invalid @enderror" id="barang_id" name="barang_id" required>
                        <option value="">Pilih barang</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}" @selected((string) old('barang_id') === (string) $barang->id)>
                                {{ $barang->nama_barang }} ({{ $barang->kode_barang }})
                            </option>
                        @endforeach
                    </select>
                    @error('barang_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="nama_peminjam">Nama Peminjam</label>
                    <input class="form-control @error('nama_peminjam') is-invalid @enderror" id="nama_peminjam" name="nama_peminjam" type="text" value="{{ old('nama_peminjam') }}" maxlength="255" required>
                    @error('nama_peminjam') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="jumlah_pinjam">Jumlah Dipinjam</label>
                    <input class="form-control @error('jumlah_pinjam') is-invalid @enderror" id="jumlah_pinjam" name="jumlah_pinjam" type="number" min="1" step="1" value="{{ old('jumlah_pinjam', 1) }}" required>
                    @error('jumlah_pinjam') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" name="tanggal_pinjam" type="date" value="{{ old('tanggal_pinjam', now()->toDateString()) }}" required>
                    @error('tanggal_pinjam') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label>
                    <input class="form-control @error('tanggal_kembali') is-invalid @enderror" id="tanggal_kembali" name="tanggal_kembali" type="date" value="{{ old('tanggal_kembali') }}">
                    <div class="form-text">Kosongkan jika barang belum dikembalikan.</div>
                    @error('tanggal_kembali') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        @foreach (['Dipinjam', 'Dikembalikan', 'Terlambat'] as $status)
                            <option value="{{ $status }}" @selected(old('status', 'Dipinjam') === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button class="btn btn-primary" type="submit"><i class="bi bi-check2-circle me-1" aria-hidden="true"></i>Simpan Peminjaman</button>
            </div>
        </form>
    </div>
@endsection
