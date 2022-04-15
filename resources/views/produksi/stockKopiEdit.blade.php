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
        @foreach ($produk as $p)
        <div class="container-fluid px-4 py-4">
            <div class="header">
                <h4><strong>Edit Data Produk</strong></h4>
            </div>
            <hr>
            <div class="form-edit">
                <form method="post" action="/stockKopi/update/{{$p->namaProduk}}/{{ $p->kategori }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    {{-- Nama Produk --}}
                    <div class="row mb-3">
                        <label for="namaProduk" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Nama Produk</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="text" id="namaProduk" readonly="readonly" class="form-control" name="namaProduk" placeholder="Nama Produk" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh Kosong')" oninput="this.setCustomValidity('')" value="{{ $p->namaProduk }}"/>
                            @if($errors->has('namaProduk'))
                            <div class="text-danger">
                                {{ $errors->first('namaProduk')}}
                            </div>
                        @endif
                        </div>
                    </div>

                    {{-- Stok --}}
                    <div class="row mb-3">
                        <label for="stok" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Jumlah Stok</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="number" class="form-control" min="0" name="jumlahStok" id="jumlahStok" placeholder="Stok Kopi" autocomplete="off" required oninvalid="this.setCustomValidity('Stok harus angka')" oninput="this.setCustomValidity('')" value="{{ $p->total_stok }}"/>
                            @if($errors->has('jumlahStok'))
                            <div class="text-danger">
                                {{ $errors->first('jumlahStok')}}
                            </div>
                        @endif
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="row mb-3">
                        <label for="kategori" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Kategori</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="text" id="kategori" readonly="readonly" class="form-control" name="kategori" placeholder="Kategori " autocomplete="off" required oninvalid="this.setCustomValidity('Kategori tidak boleh Kosong')" oninput="this.setCustomValidity('')" value="{{ $p->kategori }}"/>
                            {{-- <select name="kategori" readonly="readonly" class="form-control" placeholder="Kategori Kopi">
                                <option value="{{ $p->kategori }}">{{ $p->kategori }}</option>
                            </select> --}}
                                @if($errors->has('kategori'))
                                <div class="text-danger">
                                    {{ $errors->first('kategori')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row mb-3 justify-content-end mx-3 my-4">
                        <div class="col-sm-8 col-md-9 col-xl-10" style="text-align:end;">
                            <input type="submit" class="btn btn-success mx-3" data-bs-toggle="modal" data-bs-target="#editModal" onclick="('#editModal, #form-edit').attr('action','{{ route('updateStockKopi', [$p->namaProduk, $p->kategori]) }}')" value="{{ __('Simpan') }}">
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

<!-- Modal -->
{{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <h1 class="h2">
                <i class="fa fa-exclamation-circle mt-5" aria-hidden="true" style="font-size: 120px; color: #e62929;"></i>
            </h1>
            <div class="modal-body my-2" style="text-align: center">
                <h4>Apakah Anda yakin ingin menambah sebanyak 20 ?</h4>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="form-edit" method="post" action="{{ route('updateStockKopi', [$p->namaProduk, $p->kategori]) }}" >
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <input type="submit" class="btn btn-success" value="Simpan">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
                </form>
            </div>
      </div>
    </div>
</div> --}}
@endforeach
@endsection