<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        $totalProduk = Produk::count();
        $totalStok = Produk::sum('stok');
        $totalKategori = Produk::query()->distinct()->count('kategori');
        $totalBaik = Produk::where('kondisi', 'Baik')->count();


        return view('produk.index', compact('produks', 'totalProduk', 'totalStok', 'totalKategori', 'totalBaik'));
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
        $request->validate([
            'kode_barang' => 'required|unique:produks',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|min:0',
            'satuan' => 'required',
            'harga_satuan' => 'required',
            'kondisi' => 'required',
        ]);

        Produk::create($request->all());

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
            'kode_barang' => 'required|unique:barangs,kode_barang,'.$produk->id,
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
