@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarProduksi')
<div id="layoutSidenav_content">
    <style>
        strong, ::placeholder {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <main>
        <div class="container-fluid px-4 py-4">
            <div class="header">
                <h4><strong>Tambah Data Produk</strong></h4>
            </div>
            <hr>
            <div class="form-edit">
                <form method="post" action="/stockKopi/store">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    {{-- Nama Produk --}}
                    <div class="row mb-3">
                        <label for="nama" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Nama Produk</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="text" id="namaProduk" list="listNama" class="form-control" name="namaProduk" placeholder="Nama Produk" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh Kosong')" oninput="this.setCustomValidity('')"/>
                            <datalist id="listNama" >
                                @foreach ($produk as $p)
                                    <option>{{ $p->namaProduk }}</option>
                                @endforeach
                            </datalist>
                            @if($errors->has('namaProduk'))
                            <div class="text-danger">
                                {{ $errors->first('namaProduk')}}
                            </div>
                        @endif
                        </div>
                    </div>
                    <hr style="width:100%">
                    {{-- Kategori --}}
                    <div class="row mb-3">
                        <label for="kategori" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Biji Kopi</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <select name="kategori" class="form-control" >
                                <option>Biji Kopi</option>
                            </select>
                        </div>
                    </div>

                    {{-- Stok --}}
                    <div class="row mb-3">
                        <label for="stok" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Stok (gr)</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="number" class="form-control" min="0" name="jumlahStokBiji" id="jumlahStokBiji" placeholder="Stok Biji Kopi" autocomplete="off" required oninvalid="this.setCustomValidity('Stok harus angka')" oninput="this.setCustomValidity('')"/>
                            @if($errors->has('jumlahStokBiji'))
                            <div class="text-danger">
                                {{ $errors->first('jumlahStokBiji')}}
                            </div>
                        @endif
                        </div>
                    </div>

                    {{-- Harga Per100Gram --}}
                    <div class="row mb-3">
                        <label for="hargaPer100GramBiji" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Harga 100gr (Rp)</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="number" class="form-control" min="0" step="500" name="hargaPer100GramBiji" id="hargaPer100GramBiji" placeholder="Harga Per 100 Gram" autocomplete="off" required oninvalid="this.setCustomValidity('Harga harus angka')" oninput="this.setCustomValidity('')"/>
                            @if($errors->has('hargaPer100GramBiji'))
                            <div class="text-danger">
                                {{ $errors->first('hargaPer100GramBiji')}}
                            </div>
                        @endif
                        </div>
                    </div>
                    <hr style="width:100%">
                    {{-- Kategori --}}
                    <div class="row mb-3">
                        <label for="kategori" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Kopi Bubuk</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <select name="kategori" class="form-control">
                                <option>Kopi Bubuk</option>
                            </select>
                        </div>
                    </div>

                    {{-- Stok --}}
                    <div class="row mb-3">
                        <label for="stok" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Stok (gr)</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="number" class="form-control" min="0" name="jumlahStokBubuk" id="jumlahStokBubuk" placeholder="Stok Kopi Bubuk" autocomplete="off" required oninvalid="this.setCustomValidity('Stok harus angka')" oninput="this.setCustomValidity('')"/>
                            @if($errors->has('jumlahStokBubuk'))
                            <div class="text-danger">
                                {{ $errors->first('jumlahStokBubuk')}}
                            </div>
                        @endif
                        </div>
                    </div>

                    {{-- Harga Per100Gram --}}
                    <div class="row mb-3">
                        <label for="hargaPer100GramBubuk" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Harga 100gr (Rp)</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="number" class="form-control" min="0" step="500" name="hargaPer100GramBubuk" id="hargaPer100GramBubuk" placeholder="Harga Per 100 Gram" autocomplete="off" required oninvalid="this.setCustomValidity('Harga harus angka')" oninput="this.setCustomValidity('')"/>
                            @if($errors->has('hargaPer100GramBubuk'))
                            <div class="text-danger">
                                {{ $errors->first('hargaPer100GramBubuk')}}
                            </div>
                        @endif
                        </div>
                    </div>


                    <div class="row mb-3 justify-content-end mx-3 my-4">
                        <div class="col-sm-8 col-md-9 col-xl-10" style="text-align:end;">
                            <input type="submit" class="btn btn-success mx-3" value="Tambah">
                            <a type="button" class="btn btn-secondary border" href="/produksiStockKopi">
                                Batal
                            </a>
                        </div>
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </main>
@endsection