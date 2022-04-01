<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexKedai()
    {
        $karyawan = DB::select('select * from karyawan where type_id = :type_id', ['type_id' => 3]);
    	return view('karyawanKedai', [
            'karyawan'=>$karyawan
        ]);
    }
    public function indexProduksi()
    {
        $karyawan = DB::select('select * from karyawan where type_id = :type_id', ['type_id' => 2]);
    	return view('karyawanproduksi', [
            'karyawan'=>$karyawan
        ]);
    }

    public function indexKedaiHome()
    {
        $karyawan = DB::select('select * from karyawan where type_id = :type_id', ['type_id' => 3]);
    	return view('karyawanKedaiHome', [
            'karyawan'=>$karyawan
        ]);
    }
    public function indexProduksiHome()
    {
        $karyawan = DB::select('select * from karyawan where type_id = :type_id', ['type_id' => 2]);
    	return view('karyawanProduksiHome', [
            'karyawan'=>$karyawan
        ]);
    }

    public function indexProduksiDetail($id)
    {
        $karyawan = DB::select('select * from karyawan where id = :id', ['id' => $id]);
    	return view('produksiDetail', [
            'karyawan'=>$karyawan
        ]);
    }

    public function indexKedaiDetail($id)
    {
        $karyawan = DB::select('select * from karyawan where id = :id', ['id' => $id]);
    	return view('kedaiDetail', [
            'karyawan'=>$karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKedai()
    {
        return view('karyawanKedaiTambah');
    }
    public function createProduksi()
    {
        return view('karyawanProduksiTambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKedai(Request $request)
    {
        $this->validate($request,[
    		'namaKaryawan' => 'required',
    		'noTelepon' => 'required',
    		'alamat' => 'required',
    		'status' => 'required',
    		'type_id' => 'required'
    	]);
 
        Karyawan::create([
    		'namaKaryawan' => $request->namaKaryawan,
    		'noTelepon' => $request->noTelepon,
    		'alamat' => $request->alamat,
    		'status' => $request->status,
            'type_id' => $request->type_id
    	]);
 
    	return redirect('/karyawanKedai ');
    }
    public function storeProduksi(Request $request)
    {
        $this->validate($request,[
    		'namaKaryawan' => 'required',
    		'noTelepon' => 'required',
    		'alamat' => 'required',
    		'status' => 'required',
            'type_id' => 'required'
    	]);
 
        Karyawan::create([
    		'namaKaryawan' => $request->namaKaryawan,
    		'noTelepon' => $request->noTelepon,
    		'alamat' => $request->alamat,
    		'status' => $request->status,
            'type_id' => $request->type_id
    	]);
 
    	return redirect('/karyawanProduksi ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function editKedai($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawanKedaiEdit', ['karyawan' => $karyawan]);
    }
    public function editProduksi($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawanProduksiEdit', ['karyawan' => $karyawan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function updateKedai($id, Request $request)
    {
        $this->validate($request,[
    		'namaKaryawan' => 'required',
    		// 'user_id' => 'required',
    		'noTelepon' => 'required',
    		'alamat' => 'required',
    		'status' => 'required',
    		'type_id' => 'required'
         ]);
      
         $karyawan = Karyawan::find($id);
         $karyawan->namaKaryawan = $request->namaKaryawan;
        //  $karyawan->user_id = $request->user_id;
         $karyawan->noTelepon = $request->noTelepon;
         $karyawan->alamat = $request->alamat;
         $karyawan->status = $request->status;
         $karyawan->type_id = $request->type_id;
         $karyawan->save();
         return redirect('/karyawanKedai');
    }
    public function updateProduksi($id, Request $request)
    {
        $this->validate($request,[
    		'namaKaryawan' => 'required',
    		// 'user_id' => 'required',
    		'noTelepon' => 'required',
    		'alamat' => 'required',
    		'status' => 'required',
            'type_id' => 'required'
         ]);
      
         $karyawan = Karyawan::find($id);
         $karyawan->namaKaryawan = $request->namaKaryawan;
        //  $karyawan->user_id = $request->user_id;
         $karyawan->noTelepon = $request->noTelepon;
         $karyawan->alamat = $request->alamat;
         $karyawan->status = $request->status;
         $karyawan->type_id = $request->type_id;
         $karyawan->save();
         return redirect('/karyawanProduksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $karyawan = Karyawan::find($id);
        // $karyawan->delete();
        // return redirect('/karyawanKedai');
    }
}
