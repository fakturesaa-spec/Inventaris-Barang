@extends('layouts.barang')
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
                @if (session('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif

                <div class="row g-2 align-items-center mb-3 product-search-toolbar">
                    <div class="col-12 col-sm">
                        <div class="product-search-wrap">
                            <input class="form-control form-control-sm table-search" type="search"
                                placeholder="Cari barang" data-table-search="barangTable" aria-label="Cari barang">
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto d-grid d-sm-block">
                        <a href="{{ route('barang.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-square me-1" aria-hidden="true"></i>Tambah Barang
                        </a>
                    </div>
                </div>

                <div class="table-responsive rounded-3">
                    <table class="table align-middle mb-0" id="barangTable" data-searchable-table>
                        <thead class="text-center">
                            <tr class="table-info">
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($barangs as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                            $kondisiBadge = match ($item->kondisi) {
                                                'Baik' => 'text-bg-success',
                                                'Rusak Ringan' => 'text-bg-warning',
                                                'Rusak Berat' => 'text-bg-danger',
                                                default => 'text-bg-success',
                                            };
                                        @endphp
                                        <span class="badge {{ $kondisiBadge }}">{{ $item->kondisi }}</span>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('barang.show', $item) }}" class="btn btn-primary btn-sm" aria-label="Lihat detail barang" title="Lihat detail">
                                                <i class="bi bi-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('barang.edit', $item) }}" class="btn btn-warning btn-sm" aria-label="Edit barang" title="Edit barang">
                                                <i class="bi bi-pencil" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('barang.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" aria-label="Hapus barang" title="Hapus barang">
                                                    <i class="bi bi-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-muted py-4">Belum ada barang. Tambahkan barang terlebih dahulu.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
@endsection
