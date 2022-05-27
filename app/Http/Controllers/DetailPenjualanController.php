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
    public function indexOwnerRekap()
    {
        $data_debit = DB::table('detail_penjualan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%M - %Y') as periode"), DB::raw('kuantitas*hargaPer100Gram as total_debit'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();
        
        $data_kredit = DB::table('detail_bahan_baku')
            ->select(DB::raw("DATE_FORMAT(created_at, '%M - %Y') as periode"), DB::raw('kuantitas*hargaSatuan as total_kredit'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $all_debit = [];
        
        foreach($data_debit as $debit){
            $all_debit[] = $debit->total_debit;
        }
        
        return view('owner.ownerRekapitulasi', compact('all_debit','data_debit','data_kredit'));
    }

    public function indexOwnerRekapDetail($periode)
    {
        $data_debit = DB::table('detail_penjualan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%M - %Y') as periode"), DB::raw('kuantitas*hargaPer100Gram as total_debit'))
            ->where(DB::raw("DATE_FORMAT(created_at, '%M - %Y')"), '=', $periode)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $data_kredit = DB::table('detail_bahan_baku')
            ->select(DB::raw("DATE_FORMAT(created_at, '%M - %Y') as periode"), DB::raw('kuantitas*hargaSatuan as total_kredit'))
            ->where(DB::raw("DATE_FORMAT(created_at, '%M - %Y')"), '=', $periode)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $data_top_five = DB::table('detail_penjualan')
            ->select('produk.namaProduk as namaBahan',DB::raw("DATE_FORMAT(created_at, '%M - %Y') as periode"),DB::raw('kuantitas*hargaPer100Gram as total_debit'))
            ->join('produk', 'detail_penjualan.idProduk', '=', 'produk.id')
            ->groupBy('produk.namaProduk',DB::raw("DATE_FORMAT(created_at, '%M'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('total_debit','asc')
            ->get();

        $debit_this_mounth = [];
        $kredit_this_mounth = [];
        $top_five_produk = [];
        $top_five_harga = [];

        foreach($data_debit as $debit){
            $debit_this_mounth[] = $debit->total_debit;
        }

        foreach($data_kredit as $kredit){
            $kredit_this_mounth[] = $kredit->total_kredit;
        }
        
        $this_periode = $periode;
        
        foreach($data_top_five as $top){
            if($top->periode == $periode){
                $top_five_produk[] = $top->namaBahan;
                $top_five_harga[] = $top->total_debit;
            }
        }
        
        $top_five_produk = array_slice($top_five_produk, -5);
        $top_five_harga = array_slice($top_five_harga, -5);
        rsort(($top_five_produk));
        rsort(($top_five_harga));
        return view('owner.ownerRekapitulasiDetail', compact('data_debit','debit_this_mounth' ,'kredit_this_mounth', 'this_periode', 'top_five_produk', 'top_five_harga'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPenjualan($month)
    {
        if($month == "Keseluruhan"){
            $data_penjualan = DB::table('detail_penjualan')
                ->join('produk', 'idProduk', '=', 'produk.id')
                ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
                ->select('detail_penjualan.id as idPenjualan','detail_penjualan.created_at as tanggal','detail_penjualan.*','produk.namaProduk as namaProduk', 'kategori.kategori as kategori')
                ->orderBy('detail_penjualan.created_at', 'desc')
                ->get();
        } else {
            $data_penjualan = DB::table('detail_penjualan')
                ->join('produk', 'idProduk', '=', 'produk.id')
                ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
                ->select('detail_penjualan.id as idPenjualan','detail_penjualan.created_at as tanggal','detail_penjualan.*','produk.namaProduk as namaProduk', 'kategori.kategori as kategori')
                ->where(DB::raw("DATE_FORMAT(detail_penjualan.created_at, '%Y-%m')"), "=", $month)
                ->orderBy('detail_penjualan.created_at', 'desc')
                ->get();
        }

        $periode = DB::table('detail_penjualan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        // $nama_produk = DB::table('detail_produk')
        //     ->join('produk', 'detail_produk.idProduk', '=', 'produk.id')
        //     ->join('kategori', 'detail_produk.idKategori', '=', 'kategori.id')
        //     ->select(DB::raw("DISTINCT(produk.namaProduk) as nama"))
        //     ->groupBy('produk.namaProduk')
        //     ->having(DB::raw("SUM(detail_produk.jumlahStok)"), '>=', 0)
        //     ->get();

        $nama_produk = DB::select("SELECT DISTINCT(namaProduk) as nama FROM produk");
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

        $periodeQuery = DB::table('detail_penjualan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->orderBy('created_at','asc')
            ->get();

        $periodes = [];
        
        foreach ($periodeQuery as $data) {
            $periodes[] = $data->periode;
        }
        
        $periodeURL = $month;
        $periodes = array_unique($periodes);
        rsort(($periodes));

        return view('kedai.kedaiPenjualan', compact('data_penjualan', 'nama_produk', 'nama_kategori', 'data_produk', 'id', 'periodes', 'periodeURL'));
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
        
        $produk = DB::table('detail_produk')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'detail_produk.idKategori', '=', 'kategori.id')
            ->select(DB::raw('SUM(detail_produk.jumlahStok) as stokLama'))
            ->where([
                ['detail_produk.idProduk', '=',  ['idProduk' => $idProduk+1]],
            ])
            ->get();
        
        $kuantitasLama = 0;

        foreach($produk as $p){
            $kuantitasLama = $p->stokLama;
        }

        if(($kuantitasLama-$request->kuantitas)<0){
            Alert::warning('Gagal!', 'Stok kopi habis')->showConfirmButton($btnText = 'OK', $btnColor = '#f0ad4e');
            return redirect('/kedaiPenjualan/Keseluruhan');
        } else{
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
            return redirect('/kedaiPenjualan/Keseluruhan');
        }
        
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
            ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
            ->select('detail_penjualan.id as idPenjualan','detail_penjualan.created_at as tanggal','detail_penjualan.*','produk.namaProduk as namaProduk', 'kategori.kategori as kategori')
            ->where([
                ['detail_penjualan.id', '=',  ['id' => $idPenjualan]],
            ])
            ->get();

        return view('kedai.kedaiPenjualanEdit', ['produk' => $produk]);
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
        $data_produk = DB::table('detail_penjualan')
            ->join('produk', 'idProduk', '=', 'produk.id')
            ->join('kategori', 'detail_penjualan.idKategori', '=', 'kategori.id')
            ->select('detail_penjualan.kuantitas as kuantitasLama')
            ->where([
                ['detail_penjualan.id', '=',  ['id' => $idPenjualan]],
            ])
            ->get();

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
        
        $kuantitasLama = 0;

        foreach($data_produk as $p){
            $kuantitasLama += $p->kuantitasLama;
        }

        if($request->kuantitas >= $kuantitasLama){
            DetailProduk::create([
                'idProduk' => $idProduk+1 ,
                'jumlahStok' => $request->kuantitas - $kuantitasLama,
                'idKategori' => $idKategori+1,
                'hargaPer100Gram' => $request->harga
            ]);
        } else if($request->kuantitas < $kuantitasLama){
            DetailProduk::create([
                'idProduk' => $idProduk+1 ,
                'jumlahStok' => $kuantitasLama - $request->kuantitas,
                'idKategori' => $idKategori+1,
                'hargaPer100Gram' => $request->harga
            ]);
        }


        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
        return redirect('/kedaiPenjualan/Keseluruhan');
    }

}
