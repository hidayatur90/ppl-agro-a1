<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\DetailProduk;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function indexKedaiPenjualan()
    // {
    //     $data_penjualan = DB::table('detail_penjualan')
    //         ->join('produk', 'idProduk', '=', 'produk.id')
    //         ->join('detail_produk', 'produk.id', '=', 'detail_produk.idProduk')
    //         ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
    //         ->select('detail_penjualan.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', 'detail_produk.hargaPer100Gram as harga')
    //         ->groupBy('produk.namaProduk')
    //         // ->select('produk.namaProduk as namaProduk', 'kategori.kategori as kategori', 'detail_produk.hargaPer100Gram as harga')
    //         ->get();

    //     return view('kedai.kedaiPenjualan', ['data_penjualan'=>$data_penjualan]);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPenjualan()
    {
        $data_penjualan = DB::table('detail_penjualan')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('detail_produk', 'produk.id', '=', 'detail_produk.idProduk')
            ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
            ->select('detail_penjualan.id as idPenjualan','detail_penjualan.*','produk.namaProduk as namaProduk', 'kategori.kategori as kategori', 'detail_produk.hargaPer100Gram as harga')
            ->get();
        
        $data_harga_biji = DB::table('detail_penjualan')
            ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
            ->select('detail_penjualan.hargaPer100Gram as hargaBiji')
            ->where('kategori.kategori' , "=" , "Biji Kopi")
            ->get();

        $data_harga_bubuk = DB::table('detail_penjualan')
            ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
            ->select('detail_penjualan.hargaPer100Gram as hargaBubuk')
            ->where('kategori.kategori' , "=" , "Kopi Bubuk")
            ->get();

        $nama_produk = DB::select('SELECT DISTINCT(namaProduk) as nama FROM produk');
        $nama_kategori = DB::select('SELECT DISTINCT(kategori) as kategori FROM kategori');

        $data_produk = DB::table('detail_produk')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'detail_produk.idKategori', '=', 'kategori.id')
            ->select('produk.namaProduk as namaProduk', 'kategori.kategori as kategori', 'detail_produk.hargaPer100Gram as harga')
            ->get();

        $max_id = DB::select('SELECT MAX(id) as total_id FROM detail_penjualan');
        $id = 0;
        foreach($max_id as $mi){
            $id += $mi->total_id;
        }

        return view('kedai.kedaiPenjualan', compact('data_penjualan', 'nama_produk', 'nama_kategori', 'data_produk', 'id', 'data_harga_biji', 'data_harga_bubuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePenjualan(Request $request)
    {
        $this->validate($request,[
    		'namaProduk' => 'required',
    		'kategori' => 'required',
    		'kuantitas' => 'integer',
        ]);

        $nama_produk = DB::select('SELECT DISTINCT(namaProduk) as nama from produk order by id');
        $nama_kategori = DB::select('SELECT DISTINCT(kategori) as kategori from kategori order by id');

        $produk = [];
        $category = [];
        
        foreach ($nama_produk as $np) {
            $produk[] = $np->nama;
        }

        foreach ($nama_kategori as $nk) {
            $category[] = $nk->kategori;
        }

        $idProduk = array_search($request->namaProduk, $produk);
        $idKategori = array_search($request->kategori, $category);
        
        DetailPenjualan::create([
            'idProduk' => $idProduk+1,
            'idKategori' => $idKategori+1,
            'kuantitas' => $request->kuantitas,
            'hargaPer100Gram' => ($request->harga/$request->kuantitas)*100
        ]);

        DetailProduk::create([
            'idProduk' => $idProduk+1 ,
            'jumlahStok' => 0 - $request->kuantitas,
            'idKategori' => $idKategori+1,
            'hargaPer100Gram' => ($request->harga/$request->kuantitas)*100
        ]);

        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
        return redirect('/kedaiPenjualan');
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
    public function editPenjualan($idPenjualan)
    {
        $produk = DB::table('detail_penjualan')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('detail_produk', 'produk.id', '=', 'detail_produk.idProduk')
            ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
            ->select('detail_penjualan.id as idPenjualan','detail_penjualan.*','produk.namaProduk as namaProduk', 'kategori.kategori as kategori', 'detail_produk.hargaPer100Gram as harga')
            ->where([
                ['detail_penjualan.id', '=',  ['id' => $idPenjualan]],
            ])
            ->get();

        foreach ($produk as $p){
            $price_biji = DB::select('SELECT DISTINCT(detail_produk.hargaPer100Gram) as last_price from detail_produk join produk on produk.id=detail_produk.idProduk where idKategori=1 and namaProduk="'.$p->namaProduk.'"');
            $price_bubuk = DB::select('SELECT DISTINCT(detail_produk.hargaPer100Gram) as last_price from detail_produk join produk on produk.id=detail_produk.idProduk where idKategori=2 and namaProduk="'.$p->namaProduk.'"');
        }
        
        $last_price_biji = [];
        $last_price_bubuk = [];
        
        foreach ($price_biji as $p) {
            $last_price_biji[] = $p->last_price;
        }

        foreach ($price_bubuk as $p) {
            $last_price_bubuk[] = $p->last_price;
        }

        $last_price_biji = array_slice($last_price_biji, -1);
        $last_price_bubuk = array_slice($last_price_bubuk, -1);

        return view('kedai.kedaiPenjualanEdit', ['produk' => $produk], compact('last_price_biji', 'last_price_bubuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function updatePenjualan(Request $request, $idPenjualan)
    {
        $this->validate($request,[
    		'namaProduk' => 'required',
    		'kategori' => 'required',
    		'kuantitas' => 'integer',
        ]);

        $nama_produk = DB::select('SELECT DISTINCT(namaProduk) as nama from produk order by id');
        $nama_kategori = DB::select('SELECT DISTINCT(kategori) as kategori from kategori order by id');

        $produk = [];
        $category = [];
        
        foreach ($nama_produk as $np) {
            $produk[] = $np->nama;
        }

        foreach ($nama_kategori as $nk) {
            $category[] = $nk->kategori;
        }

        $idProduk = array_search($request->namaProduk, $produk);
        $idKategori = array_search($request->kategori, $category);
        
        DetailPenjualan::where('id', $idPenjualan)
        ->update([
            'idProduk' => $idProduk+1,
            'idKategori' => $idKategori+1,
            'kuantitas' => $request->kuantitas,
            'hargaPer100Gram' => $request->harga
        ]);

        DetailProduk::create([
            'idProduk' => $idProduk+1 ,
            'jumlahStok' => 0 - $request->kuantitas,
            'idKategori' => $idKategori+1,
            'hargaPer100Gram' => $request->harga
        ]);

        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
        return redirect('/kedaiPenjualan');
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
