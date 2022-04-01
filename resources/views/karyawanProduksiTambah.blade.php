@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
    <div id="layoutSidenav_content">
        <style>
            strong, ::placeholder {
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <main>
            <div class="container-fluid px-4 py-4">
                <div class="header">
                    <h4><strong>Tambah Data Karyawan Produksi</strong></h4>
                </div>
                <hr>
                <div class="form-edit">
                    <form method="post" action="/karyawanProduksi/store">
                        {{ csrf_field() }}
                        {{-- Nama Karyawan --}}
                        <div class="row mb-3">
                            <label for="nama" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Nama</strong></label>
                            <div class="col-sm-8 col-md-9 col-xl-10">
                                <input type="text" class="form-control" name="namaKaryawan" id="namaKaryawan" placeholder="Nama Karyawan" required/>
                                @if($errors->has('namaKaryawan'))
                                <div class="text-danger">
                                    {{ $errors->first('namaKaryawan')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        {{-- No Telepon --}}
                        <div class="row mb-3">
                            <label for="phone" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Nomor Handphone</strong></label>
                            <div class="col-sm-8 col-md-9 col-xl-10">
                                <input type="tel" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" class="form-control" name="noTelepon" id="noTelepon" placeholder="Nomor Telepon" required />
                                @if($errors->has('noTelepon'))
                                <div class="text-danger">
                                    {{ $errors->first('noTelepon')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="row mb-3">
                            <label for="address" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Alamat</strong></label>
                            <div class="col-sm-8 col-md-9 col-xl-10">
                                <textarea type="textarea" class="form-control" name="alamat" id="alamat" rows="4" placeholder="Alamat"></textarea>
                                @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label for="status" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Status</strong></label>
                            <div class="col-sm-8 col-md-9 col-xl-10">
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
                        </div>

                        <div class="form-group d-none">
                            <label>Karyawan Produksi</label>
                            <select name="type_id" class="form-control">
                                <option value="2">2</option>
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
                                <a type="button" class="btn btn-light border" href="/karyawanProduksi">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
@endsection