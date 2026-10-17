@extends('layouts.produk')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Produk</p>
                        <h1 class="h3 mb-1">Detail Produk</h1>
                        <p class="text-muted mb-0">Lihat informasi lengkap produk yang dipilih.</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('produk.index', $produk->id) }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i>  </a>
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning"><i
                                class="bi bi-pencil"></i></a>


                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>

            <section class="panel">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title"><i class="bi bi-box-seam" aria-hidden="true"></i><span>Informasi Produk</span></h2>
                        <p class="text-muted mb-0">Rincian kode, kategori, stok, satuan, harga, dan kondisi produk.</p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                        <tbody>
                            <tr>
                                <td class="fw-semibold">Kode Barang</td>
                                <td>{{ $produk->kode_barang }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Nama Barang</td>
                                <td>{{ $produk->nama_barang }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Kategori</td>
                                <td>{{ $produk->kategori }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Stok</td>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">satuan</td>
                                <td>{{ $produk->satuan }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Harga Satuan</td>
                                <td>{{ $produk->harga_satuan }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">kondisi</td>
                                <td>{{ $produk->kondisi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
@endsection
