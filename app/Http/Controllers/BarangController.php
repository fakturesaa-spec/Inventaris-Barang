<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function dashboard()
    {

        $milikSaya = Barang::where('user_id', Auth::id());

        $totalBarang = (clone $milikSaya)->count();
        $totalStok = (clone $milikSaya)->sum('stok');

        $totalKategori = (clone $milikSaya)->whereNotNull('kategori')->distinct()->count('kategori');
        $totalBaik = (clone $milikSaya)->where('kondisi', 'Baik')->count();
        $jumlahPerKategori = (clone $milikSaya)->selectRaw('kategori, COUNT(*) as jumlah')->groupBy('kategori')->orderBy('kategori')->get();
        $barangTerbaru = (clone $milikSaya)->latest()->take(5)->get();

        return view('barang.dashboard', compact(
            'totalBarang',
            'totalStok',
            'totalKategori',
            'totalBaik',
            'jumlahPerKategori',
            'barangTerbaru'
        ));

        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $barangs = Barang::where('user_id', $userId)->latest()->get();

        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_barang' => ['required', Rule::unique('barangs', 'kode_barang')->where('user_id', Auth::id())],
            'nama_barang' => 'required|string',
            'kategori' => 'required|in:Elektronik,ATK,Furniture,Lainnya',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|in:pcs,unit,box',
            'harga_satuan' => 'required|numeric|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);

        $data['user_id'] = Auth::id();

        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => ['required', Rule::unique('barangs', 'kode_barang')->where('user_id', Auth::id())->ignore($barang->id)],
            'nama_barang' => 'required|string',
            'kategori' => 'required|in:Elektronik,ATK,Furniture,Lainnya',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|in:pcs,unit,box',
            'harga_satuan' => 'required|numeric|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data Berhasil DI Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $berhasilDihapus = DB::transaction(function () use ($barang): bool {
            $barang = Barang::query()
                ->where('user_id', Auth::id())
                ->lockForUpdate()
                ->findOrFail($barang->getKey());

            if ($barang->peminjaman()->whereIn('status', ['Dipinjam', 'Terlambat'])->exists()) {
                return false;
            }

            $barang->delete();

            return true;
        });

        if (! $berhasilDihapus) {
            return redirect()->route('barang.index')
                ->with('error', 'Barang tidak dapat dihapus karena masih memiliki peminjaman aktif.');
        }

        return redirect()->route('barang.index')->with('success', 'Berhasil Menghapus Barang');
    }
}
