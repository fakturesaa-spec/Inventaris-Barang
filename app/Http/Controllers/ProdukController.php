<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
 public function dashboard()
    {
        $milikSaya = Produk::where('user_id', Auth::id());

        $totalProduk = (clone $milikSaya)->count();
        $totalStok = (clone $milikSaya)->sum('stok');

        $totalKategori = (clone $milikSaya)->whereNotNull('kategori')->distinct()->count('kategori');
        $totalBaik = (clone $milikSaya)->where('kondisi', 'Baik')->count();
        $jumlahPerKategori = (clone $milikSaya)->selectRaw('kategori, COUNT(*) as jumlah')->groupBy('kategori')->orderBy('kategori')->get();
        $produkTerbaru = (clone $milikSaya)->latest()->take(5)->get();

        return view('produk.dashboard', compact(
            'totalProduk',
            'totalStok',
            'totalKategori',
            'totalBaik',
            'jumlahPerKategori',
            'produkTerbaru'
        ));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $produks = Produk::where('user_id', $userId)
            ->latest()
            ->get();

        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_barang' => 'required', Rule::unique('produks', 'kode_barang')->where('user_id', Auth::id()),
            'nama_barang' => 'required|string',
            'kategori' => 'required|in:Elektronik,ATK,Furniture,Lainnya',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|in:pcs,unit,box',
            'harga_satuan' => 'required|numeric|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);

        $data['user_id'] = Auth::id();

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Data Berhasil Di Buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kode_barang' => 'required|unique:produks,kode_barang,'.$produk->id,
            'nama_barang' => 'required|string',
            'kategori' => 'required|in:Elektronik,ATK,Furniture,Lainnya',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|in:pcs,unit,box',
            'harga_satuan' => 'required|numeric|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Data Berhasil DI Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Berhasil Menghapus Produk');
    }
}
