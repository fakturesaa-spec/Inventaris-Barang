@extends('layouts.barang')

@section('content')
	<main class="dashboard-content">
		<div class="container-fluid px-3 px-lg-4 py-4">
			<div class="page-heading mb-4">
				<div class="page-heading-copy">
					<span class="page-icon"><i class="bi bi-clipboard-data" aria-hidden="true"></i></span>
					<div>
						<p class="eyebrow mb-1">Peminjaman</p>
						<h1 class="h3 mb-1">Detail Peminjaman</h1>
						<p class="text-muted mb-0">Rincian barang dan informasi peminjam.</p>
					</div>
				</div>
				<div class="heading-actions d-flex gap-2">
					<a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary" aria-label="Kembali" title="Kembali">
						<i class="bi bi-arrow-left" aria-hidden="true"></i>
					</a>
					<a href="{{ route('peminjaman.edit', $peminjaman) }}" class="btn btn-warning" aria-label="Edit peminjaman" title="Edit peminjaman">
						<i class="bi bi-pencil" aria-hidden="true"></i>
					</a>
					<form action="{{ route('peminjaman.destroy', $peminjaman) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus peminjaman ini?')">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger" aria-label="Hapus peminjaman" title="Hapus peminjaman">
							<i class="bi bi-trash" aria-hidden="true"></i>
						</button>
					</form>
				</div>
			</div>

			<section class="panel">
				<div class="panel-header">
					<div>
						<h2 class="h5 mb-1 section-title"><i class="bi bi-box-seam" aria-hidden="true"></i><span>Informasi Peminjaman</span></h2>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table align-middle mb-0">
						<tbody>
							<tr>
								<td class="fw-semibold">Nama Barang</td>
								<td>{{ $peminjaman->barang->nama_barang }}</td>
							</tr>
							<tr>
								<td class="fw-semibold">Kode Barang</td>
								<td>{{ $peminjaman->barang->kode_barang }}</td>
							</tr>
							<tr>
								<td class="fw-semibold">Nama Peminjam</td>
								<td>{{ $peminjaman->nama_peminjam }}</td>
							</tr>
							<tr>
								<td class="fw-semibold">Jumlah Dipinjam</td>
								<td>{{ $peminjaman->jumlah_pinjam }} {{ $peminjaman->barang->satuan }}</td>
							</tr>
							<tr>
								<td class="fw-semibold">Tanggal Pinjam</td>
								<td>{{ \Illuminate\Support\Carbon::parse($peminjaman->tanggal_pinjam)->format('d/m/Y') }}</td>
							</tr>
							<tr>
								<td class="fw-semibold">Tanggal Kembali</td>
								<td>{{ $peminjaman->tanggal_kembali ? \Illuminate\Support\Carbon::parse($peminjaman->tanggal_kembali)->format('d/m/Y') : 'Belum dikembalikan' }}</td>
							</tr>
							<tr>
								<td class="fw-semibold">Status</td>
								<td>{{ $peminjaman->status }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</main>
@endsection
