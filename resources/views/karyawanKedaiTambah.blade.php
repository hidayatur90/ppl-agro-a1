@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH DATA KARYAWAN</strong>
                </div>
                <div class="card-body">
                    <a href="/karyawanKedai" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
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
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
@endsection