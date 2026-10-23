@extends('layouts.barang')

@section('content')
    <div class="page-heading mb-4 ms-4 mt-5">
        <div class="page-heading-copy">
            <span class="page-icon"><i class="bi bi-clipboard-data" aria-hidden="true"></i></span>
            <div>
                <p class="eyebrow mb-1">Sistem Inventaris Barang</p>
                <h1 class="h3 mb-1">Daftar Peminjaman</h1>
                <p class="text-muted mb-0">Catatan barang yang dipinjam.</p>
            </div>
        </div>
    </div>

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
                                placeholder="Cari peminjaman" data-table-search="loansTable" aria-label="Cari peminjaman">
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto d-grid d-sm-block">
                        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-square me-1" aria-hidden="true"></i>Tambah Peminjaman
                        </a>
                    </div>
                </div>

                <div class="table-responsive rounded-3">
                    <table class="table align-middle mb-0" id="loansTable" data-searchable-table>
                        <thead class="text-center">
                            <tr class="table-info">
                                <th scope="col">No</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Peminjam</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($peminjamans as $peminjaman)
                                <tr>
                                    <th scope="row">{{ $peminjamans->firstItem() + $loop->index }}</th>
                                    <td>
                                        <div class="fw-semibold">{{ $peminjaman->barang->nama_barang }}</div>
                                        <small class="text-muted">{{ $peminjaman->barang->kode_barang }}</small>
                                    </td>
                                    <td>{{ $peminjaman->nama_peminjam }}</td>
                                    <td>{{ $peminjaman->jumlah_pinjam }} {{ $peminjaman->barang->satuan }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($peminjaman->tanggal_pinjam)->format('d/m/Y') }}</td>
                                    <td>{{ $peminjaman->tanggal_kembali ? \Illuminate\Support\Carbon::parse($peminjaman->tanggal_kembali)->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        @php
                                            $statusBadge = match ($peminjaman->status) {
                                                'Dikembalikan' => 'text-bg-success',
                                                'Terlambat' => 'text-bg-danger',
                                                default => 'text-bg-warning',
                                            };
                                        @endphp
                                        <span class="badge {{ $statusBadge }}">{{ $peminjaman->status }}</span>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('peminjaman.show', $peminjaman) }}" class="btn btn-primary btn-sm" aria-label="Lihat detail" title="Lihat detail">
                                                <i class="bi bi-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('peminjaman.edit', $peminjaman) }}" class="btn btn-warning btn-sm" aria-label="Edit peminjaman" title="Edit peminjaman">
                                                <i class="bi bi-pencil" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('peminjaman.destroy', $peminjaman) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus peminjaman ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" aria-label="Hapus peminjaman" title="Hapus peminjaman">
                                                    <i class="bi bi-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-muted py-4">Belum ada catatan peminjaman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($peminjamans->hasPages())
                    <div class="mt-3">{{ $peminjamans->links() }}</div>
                @endif
            </section>
        </div>
    </main>
@endsection

