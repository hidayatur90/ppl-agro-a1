@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>EDIT DATA KARYAWAN PRODUKSI</strong>
                </div>
                <div class="card-body">
                    <form method="post" action="/karyawanProduksi/update/{{$karyawan->id}}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="namaKaryawan" class="form-control" placeholder="Nama Karyawan" value="{{$karyawan->namaKaryawan}}">
                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="tel" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" name="noTelepon" class="form-control" placeholder="No Telepon" value="{{$karyawan->noTelepon}}">
                            @if($errors->has('noTelepon'))
                                <div class="text-danger">
                                    {{ $errors->first('noTelepon')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat Karyawan">{{$karyawan->alamat}}</textarea>
                            @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" placeholder="Status Karyawan" value="{{$karyawan->status}}">
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
                            <label>Karyawan Produksi</label>
                            <select name="type_id" class="form-control" value="{{$karyawan->type_id}}">
                                <option value="2">2</option>
                            </select>
                             @if($errors->has('type_id'))
                                <div class="text-danger">
                                    {{ $errors->first('type_id')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group my-3 text-align-end">
                            <a href="/karyawanProduksi" class="btn btn-danger">Kembali</a>
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
@endsection