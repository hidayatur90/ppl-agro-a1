<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\DetailProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class DetailProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProduksiStockKopi()
    {
        $produk = DB::table('detail_produk')
                ->join('produk', 'idProduk', '=', 'produk.id')
                ->join('kategori', 'idKategori', '=', 'kategori.id')
                ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
                ->groupBy('produk.namaProduk')
                ->get();
        
        return view('produksi.produksiStockKopi', [
            'produk'=>$produk
        ]);
    }
    public function indexOwnerStockKopi()
    {
        $produk = DB::table('detail_produk')
                ->join('produk', 'idProduk', '=', 'produk.id')
                ->join('kategori', 'idKategori', '=', 'kategori.id')
                ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
                ->groupBy('produk.namaProduk')
                ->get();
        
        return view('owner.ownerStockKopi', [
            'produk'=>$produk
        ]);
    }
    public function indexKedaiStockKopi()
    {
        $produk = DB::table('detail_produk')
                ->join('produk', 'idProduk', '=', 'produk.id')
                ->join('kategori', 'idKategori', '=', 'kategori.id')
                ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
                ->groupBy('produk.namaProduk')
                ->get();
        
        return view('kedai.kedaiStockKopi', [
            'produk'=>$produk
        ]);
    }

    public function indexProduksiStockKopiDetail($namaProduk)
    {
        $produk = DB::table('detail_produk')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'idKategori', '=', 'kategori.id')
            ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
            ->where('produk.namaProduk', '=',  ['namaProduk' => $namaProduk])
            ->groupBy('kategori.kategori')
            ->get();

        return view('produksi.produksiStockKopiDetail', [
            'produk'=>$produk
        ]);
    }

    public function indexOwnerStockKopiDetail($namaProduk)
    {
        // $produk = DB::select('select * from produk where namaProduk = :namaProduk', ['namaProduk' => $namaProduk]);
    	
        $produk = DB::table('detail_produk')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'idKategori', '=', 'kategori.id')
            ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
            ->where('produk.namaProduk', '=',  ['namaProduk' => $namaProduk])
            ->groupBy('kategori.kategori')
            ->get();
        
        return view('owner.ownerStockKopiDetail', [
            'produk'=>$produk
        ]);
    }
    public function indexKedaiStockKopiDetail($namaProduk)
    {
        // $produk = DB::select('select * from produk where namaProduk = :namaProduk', ['namaProduk' => $namaProduk]);
    	
        $produk = DB::table('detail_produk')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'idKategori', '=', 'kategori.id')
            ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
            ->where('produk.namaProduk', '=',  ['namaProduk' => $namaProduk])
            ->groupBy('kategori.kategori')
            ->get();
        
        return view('kedai.KedaiStockKopiDetail', [
            'produk'=>$produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStockKopi()
    {
        $produk = DB::select('SELECT DISTINCT(namaProduk) from produk');

    	return view('produksi.stockKopiTambah', [
            'produk'=>$produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStockKopi(Request $request)
    {
        $this->validate($request,[
    		'namaProduk' => 'required',
    		'jumlahStok' => 'required|integer',
    		'kategori' => 'required'
    	]);

        $produk = DB::select('SELECT COUNT(DISTINCT(namaProduk)) as jumlah_id from produk');

        Produk::create([
            'namaProduk' => $request->namaProduk
        ]);

        foreach ($produk as $p){
            DetailProduk::create([
                'idProduk' => $p->jumlah_id + 1,
                'jumlahStok' => $request->jumlahStok,
                'idKategori' => $request->kategori
            ]);
        }

        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
        return redirect('/produksiStockKopi');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function editStockKopi($namaProduk, $kategori)
    {

        $produk = DB::table('detail_produk')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'idKategori', '=', 'kategori.id')
            ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
            ->where([
                ['produk.namaProduk', '=',  ['namaProduk' => $namaProduk]],
                ['kategori.kategori', '=',  ['kategori' => $kategori]]
            ])
            ->groupBy('kategori.kategori')
            ->get();

        return view('produksi.stockKopiEdit', ['produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function updateStockKopi($namaProduk, $kategori, Request $request)
    {
        $this->validate($request,[
            'idProduk',
            'jumlahStok' => 'required|integer',
            'idKategori'
        ]);
        
        $produk = DB::table('detail_produk')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'idKategori', '=', 'kategori.id')
            ->select('detail_produk.*', 'produk.namaProduk as namaProduk', 'kategori.kategori as kategori', DB::raw('SUM(jumlahStok) as total_stok'))
            ->where([
                ['produk.namaProduk', '=',  ['namaProduk' => $namaProduk]],
                ['kategori.kategori', '=',  ['kategori' => $kategori]]
            ])
            ->groupBy('kategori.kategori')
            ->get();
        
        foreach ($produk as $p){
            DetailProduk::create([
                'idProduk' => $p->idProduk,
                'jumlahStok' => $request->jumlahStok - $p->total_stok,
                'idKategori' => $p->idKategori
            ]);
            
            Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
            return redirect("/produksiStockKopi/detail/$p->namaProduk");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
