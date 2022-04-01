<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner = Owner::all();
    	return view('ownerMitra', [
            'owner'=>$owner
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::find($id);
        return view('ownerMitraEdit', ['owner' => $owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
    		'namaMitra' => 'required',
    		// 'user_id' => 'required',
    		'noTelepon' => 'required',
    		'alamat' => 'required',
    		'type_id' => 'required'
         ]);
      
         $owner = Owner::find($id);
         $owner->namaMitra = $request->namaMitra;
        //  $owner->user_id = $request->user_id;
         $owner->noTelepon = $request->noTelepon;
         $owner->alamat = $request->alamat;
         $owner->type_id = $request->type_id;
         $owner->save();
         
         Alert::success('Sukses!', 'Data berhasil di edit')->showConfirmButton($btnText = 'OK', $btnColor = '#4CAF50');
         
         return redirect('/ownerMitra'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
