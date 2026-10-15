<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();

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
            'kode_barang' => ['required', Rule::unique('produks')->ignore($produk->id)],
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok' => 'required|min:0',
            'satuan' => 'required',
            'harga_satuan' => 'required',
            'kondisi' => 'required',
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
