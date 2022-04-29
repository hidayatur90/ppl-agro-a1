<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\DetailBahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class DetailBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProduksiBahanBaku()
    {
        $bahan_baku = DB::table('detail_bahan_baku')
        ->join('bahan_baku', 'idBahan', '=', 'bahan_baku.id')
        ->select('detail_bahan_baku.*', DB::raw('MAX(updated_at) as last_updated'), 'bahan_baku.namaBahan as namaBahan', DB::raw('SUM(kuantitas) as total_stok_bahan'))
        ->groupBy('bahan_baku.namaBahan')
        ->get();

        return view('produksi.produksiBahanBaku', [
            'bahan_baku'=>$bahan_baku
    ]);
    }

    public function indexProduksiBahanBakuDetail()
    {
        $bahan_baku = DB::table('detail_bahan_baku')
        ->join('bahan_baku', 'idBahan', '=', 'bahan_baku.id')
        ->select('detail_bahan_baku.*', DB::raw('MAX(updated_at) as last_updated'), 'bahan_baku.namaBahan as namaBahan', DB::raw('SUM(kuantitas) as total_stok_bahan'))
        ->groupBy('bahan_baku.namaBahan')
        ->get();

        return view('produksi.produksiBahanBaku', [
            'bahan_baku'=>$bahan_baku
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBahanBaku()
    {
        $bahan_baku = DB::select('SELECT DISTINCT(namaBahan) from bahan_baku');

    	return view('produksi.bahanBakuTambah', [
            'bahan_baku'=>$bahan_baku
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBahanBaku(Request $request)
    {
        $this->validate($request,[
    		'namaBahan' => 'required|string|unique:bahan_baku,namaBahan',
    		'kuantitas' => 'integer',
    		'hargaSatuan' => 'integer'],[
                'unique' => 'Bahan Baku '. $request->namaBahan .' sudah ada. Silahkan edit melalui menu Edit',
            ]
        );

        $bahan_baku = DB::select('SELECT COUNT(DISTINCT(namaBahan)) as jumlah_id from bahan_baku');

        BahanBaku::create([
            'namaBahan' => $request->namaBahan
        ]);

        foreach ($bahan_baku as $bahan){
            DetailBahanBaku::create([
                'idBahan' => $bahan->jumlah_id + 1,
                'kuantitas' => $request->kuantitas,
                'hargaSatuan' => $request->hargaSatuan,
                'keterangan' => $request->keterangan 
            ]);
        }

        Alert::success('Sukses!', 'Data berhasil disimpan')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
        return redirect('/produksiBahanBaku');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailBahanBaku  $detailBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function show(DetailBahanBaku $detailBahanBaku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailBahanBaku  $detailBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailBahanBaku $detailBahanBaku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailBahanBaku  $detailBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailBahanBaku $detailBahanBaku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailBahanBaku  $detailBahanBaku
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailBahanBaku $detailBahanBaku)
    {
        //
    }
}
