@extends('layouts.barang')
@section('content')
    <div class="container-fluid px-3 px-lg-4 py-4">
        <div class="page-heading mb-4">
            <div class="page-heading-copy">
                <span class="page-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
                <div>
                    <p class="eyebrow mb-1">Barang</p>
                    <h1 class="h3 mb-1">Tambah Barang</h1>
                    <p class="text-muted mb-0">Masukkan informasi barang yang akan disimpan.</p>
                </div>
            </div>
        </div>

        <form class="panel" method="POST" action="{{ route('barang.store') }}">
            @csrf

            <div class="panel-header">
                <div>
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-pencil-square" aria-hidden="true"></i><span>Informasi Barang</span></h2>
                    <p class="text-muted mb-0">Lengkapi semua kolom sebelum menyimpan.</p>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="kode_barang">Kode Barang</label>
                    <input class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" type="text" value="{{ old('kode_barang') }}" required>
                    @error('kode_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="nama_barang">Nama Barang</label>
                    <input class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" type="text" value="{{ old('nama_barang') }}" required>
                    @error('nama_barang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="kategori">Kategori</label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="">Pilih kategori</option>
                        @foreach (['Elektronik', 'ATK', 'Furniture', 'Lainnya'] as $kategori)
                            <option value="{{ $kategori }}" @selected(old('kategori') === $kategori)>{{ $kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="stok">Stok</label>
                    <input class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" type="number" min="0" step="1" value="{{ old('stok') }}" required>
                    @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="satuan">Satuan</label>
                    <select class="form-select @error('satuan') is-invalid @enderror" id="satuan" name="satuan" required>
                        <option value="">Pilih satuan</option>
                        @foreach (['pcs', 'unit', 'box'] as $satuan)
                            <option value="{{ $satuan }}" @selected(old('satuan') === $satuan)>{{ strtoupper($satuan) }}</option>
                        @endforeach
                    </select>
                    @error('satuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="harga_satuan">Harga Satuan</label>
                    <input class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" name="harga_satuan" type="number" min="0" step="0.01" value="{{ old('harga_satuan') }}" required>
                    @error('harga_satuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="kondisi">Kondisi</label>
                    <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi" required>
                        <option value="">Pilih kondisi</option>
                        @foreach (['Baik', 'Rusak Ringan', 'Rusak Berat'] as $kondisi)
                            <option value="{{ $kondisi }}" @selected(old('kondisi') === $kondisi)>{{ $kondisi }}</option>
                        @endforeach
                    </select>
                    @error('kondisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button class="btn btn-primary" type="submit"><i class="bi bi-check2-circle me-1" aria-hidden="true"></i>Simpan Barang</button>
            </div>
        </form>
    </div>
@endsection
