<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $peminjamans = Peminjaman::query()
            ->with('barang')
            ->whereHas('barang', fn ($query) => $query->where('user_id', Auth::id()))
            ->latest()
            ->paginate(15);

        return view('peminjaman.index', compact('peminjamans'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $barangs = Barang::where('user_id', Auth::id())->orderBy('nama_barang')->get();

        return view('peminjaman.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'barang_id' => [
                'required',
                'integer',
                Rule::exists('barangs', 'id')->where('user_id', Auth::id()),
            ],
            'nama_peminjam' => ['required', 'string', 'max:255'],
            'jumlah_pinjam' => ['required', 'integer', 'min:1'],
            'tanggal_pinjam' => ['required', 'date'],
            'tanggal_kembali' => ['nullable', 'date', 'after_or_equal:tanggal_pinjam'],
            'status' => ['required', Rule::in(['Dipinjam', 'Dikembalikan', 'Terlambat'])],
        ]);

        Peminjaman::create($data);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman): View
    {
        $this->ensurePeminjamanMilikPengguna($peminjaman);
        $peminjaman->load('barang');

        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman): View
    {
        $this->ensurePeminjamanMilikPengguna($peminjaman);
        $barangs = Barang::where('user_id', Auth::id())->orderBy('nama_barang')->get();

        return view('peminjaman.edit', compact('peminjaman', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman): RedirectResponse
    {
        $this->ensurePeminjamanMilikPengguna($peminjaman);

        $data = $request->validate([
            'barang_id' => [
                'required',
                'integer',
                Rule::exists('barangs', 'id')->where('user_id', Auth::id()),
            ],
            'nama_peminjam' => ['required', 'string', 'max:255'],
            'jumlah_pinjam' => ['required', 'integer', 'min:1'],
            'tanggal_pinjam' => ['required', 'date'],
            'tanggal_kembali' => ['nullable', 'date', 'after_or_equal:tanggal_pinjam'],
            'status' => ['required', Rule::in(['Dipinjam', 'Dikembalikan', 'Terlambat'])],
        ]);

        $peminjaman->update($data);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman): RedirectResponse
    {
        $this->ensurePeminjamanMilikPengguna($peminjaman);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }

    private function ensurePeminjamanMilikPengguna(Peminjaman $peminjaman): void
    {
        abort_unless(
            $peminjaman->barang()->where('user_id', Auth::id())->exists(),
            404
        );
    }
}
