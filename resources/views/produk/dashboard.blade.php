@extends('layouts.produk')
@section('content')
    {{-- 3 kartu atas --}}
    <section class="row g-3 mt-1 justify-content-center" aria-label="Dashboard metrics">

        <div class="page-heading mb-4 ms-4 mt-5">
            <div class="page-heading-copy">
                <span class="page-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
                <div>
                    <p class="eyebrow mb-1">Sistem Inventaris Barang</p>
                    <h1 class="h3 mb-1">Selamat Datang, {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <article class="metric-card metric-primary">
                <div class="metric-top">
                    <span class="metric-label">TOTAL PRODUK</span>
                    <span class="metric-icon"><i class="bi bi-box2-fill"></i></span>
                </div>
                <div class="metric-value">{{ $totalProduk }}</div>
                <div class="metric-meta">
                    Jumlah Seluruh Barang
                </div>
            </article>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <article class="metric-card metric-success">
                <div class="metric-top">
                    <span class="metric-label">TOTAL STOK</span>
                    <span class="metric-icon"><i class="bi bi-boxes"></i></span>
                </div>
                <div class="metric-value">{{ $totalStok }}</div>
                <div class="metric-meta">
                    <span>Seluruh Total Stok</span>
                </div>
            </article>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <article class="metric-card metric-danger">
                <div class="metric-top">
                    <span class="metric-label">KONDISI BAIK</span>
                    <span class="metric-icon"><i class="bi bi-check2-circle"></i></span>
                </div>
                <div class="metric-value">{{ $totalBaik }}</div>
                <div class="metric-meta">
                    <span>Total Barang berkondisi baik</span>
                </div>
            </article>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <article class="metric-card metric-primary">
                <div class="metric-top">
                    <span class="metric-label">KATEGORI</span>
                    <span class="metric-icon"><i class="bi bi-tags"></i></span>
                </div>
                <div class="metric-value">{{ $totalKategori }}</div>
                <div class="metric-meta">Kategori barang terdaftar</div>
            </article>
        </div>
    </section>

    <section class="row g-3 mt-2" aria-label="Ringkasan inventaris">
        <div class="col-12 col-xl-8">
            <section class="panel h-100">
                <div class="panel-header d-flex justify-content-between align-items-center gap-3">
                    <div>
                        <h2 class="h5 mb-1 section-title">Barang Terbaru</h2>
                        <p class="text-muted mb-0">Lima barang terakhir yang ditambahkan.</p>
                    </div>
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col"><span class="visually-hidden">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkTerbaru as $produk)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $produk->nama_barang }}</div>
                                        <small class="text-muted">{{ $produk->kode_barang }}</small>
                                    </td>
                                    <td>{{ $produk->kategori }}</td>
                                    <td>{{ $produk->stok }} {{ $produk->satuan }}</td>
                                    <td>{{ $produk->kondisi }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-outline-secondary btn-sm" aria-label="Lihat {{ $produk->nama_barang }}">
                                            <i class="bi bi-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada barang yang tercatat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div class="col-12 col-xl-4">
            <section class="panel h-100">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">Barang per Kategori</h2>
                        <p class="text-muted mb-0">Jumlah barang pada setiap kategori.</p>
                    </div>
                </div>
                <div class="list-group list-group-flush">
                    @forelse ($jumlahPerKategori as $kategori)
                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span>{{ $kategori->kategori }}</span>
                            <span class="badge text-bg-primary rounded-pill">{{ $kategori->jumlah }}</span>
                        </div>
                    @empty
                        <p class="text-muted mb-3">Belum ada kategori barang.</p>
                    @endforelse
                </div>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>Tambah Barang
                    </a>
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm">Daftar Barang</a>
                </div>
            </section>
        </div>
    </section>
@endsection
