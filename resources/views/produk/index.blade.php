@extends('layouts.produk')
@section('content')
    {{-- 3 kartu atas --}}
    <section class="row g-3 mt-1 justify-content-center" aria-label="Dashboard metrics">

        <div class="page-heading welcome-heading">
            <div class="page-heading-copy">
                <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                <div>
                    <h1 class="h3 mb-1">Selamat Datang, {{ Auth::user()->name }}</h1>
                    <p class="text-muted mb-0">Kelola Data Produk</p>
                </div>
            </div>
            <div class="heading-actions">
                <span>{{ now()->translatedFormat('l, d F Y') }}</span>
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
    </section>

    {{-- Seluruh Data Barang --}}
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <section class="panel">
                <div class="row">
                    <div class="col-sm">
                        <div class="panel-header">
                            <input class="form-control form-control-sm table-search" type="search"
                                placeholder="Search orders" data-table-search="ordersTable" aria-label="Search orders">
                        </div>
                    </div>
                    <div class="col-sm text-end">
                        <a href="{{ route('produk.create') }}" class="btn btn-primary"> <i class="bi bi-plus"></i> Tambah Produk</a>
                    </div>
                </div>

                <div class="table-responsive rounded-3">
                    <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                        <thead class="text-center">
                            <tr class="table-info">
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">kondisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($produks as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>{{ $item->harga_satuan }}</td>
                                    <td>{{ $item->kondisi }}</td>
                                    <td>
                                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="{{ route('produk.show', $item->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('produk.show', $item->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
@endsection
