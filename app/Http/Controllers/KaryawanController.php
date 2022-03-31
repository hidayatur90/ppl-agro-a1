<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
    	return view('karyawanKedai', [
            'karyawan'=>$karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawanKedaiTambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'namaKaryawan' => 'required',
    		'noTelepon' => 'required',
    		'alamat' => 'required',
    		'status' => 'required'
    	]);
 
        Karyawan::create([
    		'namaKaryawan' => $request->namaKaryawan,
    		'noTelepon' => $request->noTelepon,
    		'alamat' => $request->alamat,
    		'status' => $request->status
    	]);
 
    	return redirect('/karyawanKedai ');
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
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawanKedaiEdit', ['karyawan' => $karyawan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
    		'namaKaryawan' => 'required',
    		// 'user_id' => 'required',
    		'noTelepon' => 'required',
    		'alamat' => 'required',
    		'status' => 'required'
         ]);
      
         $karyawan = Karyawan::find($id);
         $karyawan->namaKaryawan = $request->namaKaryawan;
        //  $karyawan->user_id = $request->user_id;
         $karyawan->noTelepon = $request->noTelepon;
         $karyawan->alamat = $request->alamat;
         $karyawan->status = $request->status;
         $karyawan->save();
         return redirect('/karyawanKedai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
        return redirect('/karyawanKedai');
    }
}
