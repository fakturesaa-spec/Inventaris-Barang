@extends('layouts.produk')
@section('content')
    <div class="page-heading mb-4 ms-4 mt-5">
        <div class="page-heading-copy">
            <span class="page-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
            <div>
                <p class="eyebrow mb-1">Sistem Inventaris Barang</p>
                <h1 class="h3 mb-1">Daftar Seluruh Barang</h1>
                <p class="text-muted mb-0">Daftar barang yang tercatat dalam sistem inventaris.</p>
            </div>
        </div>
    </div>

    {{-- Seluruh Daftar Barang --}}
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <section class="panel">
                <div class="row g-2 align-items-end">
                    <div class="col-12 col-sm">
                        <div class="panel-header">
                            <input class="form-control form-control-sm table-search" type="search"
                                placeholder="Cari Barang" data-table-search="ordersTable" aria-label="Search orders">
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto d-grid d-sm-block mb-1">
                        <a href="{{ route('produk.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-square me-1" aria-hidden="true"></i>Tambah Produk
                        </a>
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

                            @forelse ($produks as $item)
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
                                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning"><i
                                                    class="bi bi-pencil"></i></a>
                                            <a href="{{ route('produk.show', $item->id) }}" class="btn btn-primary"><i
                                                    class="bi bi-eye"></i></a>

                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-muted mb-3">Belum ada barang, tambahkan barang terlebih dahulu.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
@endsection
