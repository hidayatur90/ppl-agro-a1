@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH DATA KARYAWAN KEDAI</strong>
                </div>
                <div class="card-body">    
                    <form method="post" action="/karyawanKedai/store">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="namaKaryawan" class="form-control" placeholder="Nama Karyawan">
                            @if($errors->has('namaKaryawan'))
                                <div class="text-danger">
                                    {{ $errors->first('namaKaryawan')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="tel" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" name="noTelepon" class="form-control" placeholder="No Telepon">
                            @if($errors->has('noTelepon'))
                                <div class="text-danger">
                                    {{ $errors->first('noTelepon')}}
                                </div>
                            @endif
                        </div>
 
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat Karyawan"></textarea>
                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" placeholder="Status Karyawan">
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                             @if($errors->has('status'))
                                <div class="text-danger">
                                    {{ $errors->first('status')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group d-none">
                            <label>Karyawan Kedai</label>
                            <select name="type_id" class="form-control">
                                <option value="3">3</option>
                            </select>
                             @if($errors->has('type_id'))
                                <div class="text-danger">
                                    {{ $errors->first('type_id')}}
                                </div>
                            @endif
                        </div>

                        <div class="row mb-3 justify-content-end mx-3 my-4">
                            <div class="col-sm-8 col-md-9 col-xl-10" style="text-align:end;">
                                <input type="submit" class="btn btn-success mx-3" value="Tambah">
                                <a type="button" class="btn btn-light border" href="/karyawanKedai">
                                    Batal
                                </a>
                            </div>
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
@endsection