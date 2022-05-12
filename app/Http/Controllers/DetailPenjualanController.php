<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\DetailProduk;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexKedaiPenjualan()
    {
        $data_penjualan = DB::table('detail_penjualan')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('detail_produk', 'produk.id', '=', 'detail_produk.idProduk')
            ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
            ->select('detail_penjualan.*', DB::raw('MAX(detail_penjualan.updated_at) as last_updated'), 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', 'detail_produk.hargaPer100Gram as harga')
            ->groupBy('produk.namaProduk')
            ->get();

        $nama_produk = DB::select('SELECT DISTINCT(namaProduk) as nama from produk');
        $nama_kategori = DB::select('SELECT DISTINCT(kategori) as kategori from kategori');

        return view('kedai.kedaiPenjualan', ['data_penjualan'=>$data_penjualan], compact('nama_produk', 'nama_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPenjualan(Request $request, $namaProduk, $kategori)
    {
        $this->validate($request,[
    		'namaProduk' => 'required|string|unique:produk,namaProduk',
    		'kategori' => 'required',
    		'kuantitas' => 'integer',
        ]);

        $nama_produk = DB::select('SELECT DISTINCT(namaProduk) as nama from produk');
        $nama_kategori = DB::select('SELECT DISTINCT(kategori) as kategori from kategori');

        $idProduk = array_search($namaProduk, $nama_produk);
        $idKategori = array_search($kategori, $nama_kategori);

        DetailPenjualan::create([
            'idProduk' => $idProduk,
            'idKategori' => $idKategori,
            'kuantitas' => $request->kuantitas,
            'hargaPer100Gram' => $request->harga
        ]);

        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
        return redirect('/kedaiPenjualan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPenjualan $detailPenjualan)
    {
        //
    }
}
