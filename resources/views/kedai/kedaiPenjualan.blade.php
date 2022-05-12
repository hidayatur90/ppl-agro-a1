@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarKedai')
<div id="layoutSidenav_content">
    <style>
        strong, thead{
            font-family: 'Poppins', sans-serif;
        }
        </style>
    <main>
        <div class="container-fluid px-4">
            
            <div class="card mt-3">
                <div class="card-header text-start">
                    <strong>Tambah Data</strong> 
                </div>
                <div class="card-body">
                <p>Masukkan data penjualan :</p>
                @foreach($data_penjualan as $data)
                <div class="border p-3">
                    <form class="row" method="post" action="/penjualan/create/{{$data->namaProduk}}/{{ $data->kategori }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="mb-3 col-xl-6 col-md-12">
                            <label for="namaProduk" class="form-label">Nama Produk</label>
                            <input type="text" id="namaProduk" list="listNama" class="form-control" name="namaProduk" placeholder="Nama Produk" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh Kosong')" oninput="this.setCustomValidity('')"/>
                            <datalist id="listNama" >
                                @foreach ($nama_produk as $np)
                                    <option>{{ $np->nama }}</option>
                                @endforeach
                            </datalist>
                            @if($errors->has('namaProduk'))
                            <div class="text-danger">
                                {{ $errors->first('namaProduk')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3 col-xl-6 col-md-12">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" id="kategori" list="listKategori" class="form-control" name="kategori" placeholder="Kategori" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh Kosong')" oninput="this.setCustomValidity('')"/>
                            <datalist id="listKategori" >
                                @foreach ($nama_kategori as $nk)
                                    <option>{{ $nk->kategori }}</option>
                                @endforeach
                            </datalist>
                            @if($errors->has('kategori'))
                            <div class="text-danger">
                                {{ $errors->first('kategori')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3 col-xl-6 col-md-12">
                            <label for="kuantitas" class="form-label">Kuantitas</label>
                            <input name="kuantitas" type="number" class="form-control" id="kuantitas" placeholder="Jumlah Kuantitas"/>
                        </div>
                        <div class="mb-3 col-xl-6 col-md-12">
                            <label for="harga" class="form-label">Harga Total</label>
                            <input name="harga" readonly type="number" class="form-control" id="harga" placeholder="Harga Total"/>
                        </div>
                        <div>
                            <button class="btn btn-success w-100">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header text-start">
                <strong>Data Penjualan Kopi</strong> 
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->namaProduk }}</td>
                            <td>{{ $data->kuantitas }}</td>
                            <td>{{ $data->harga }}</td>
                            @php
                                $harga_total = $data->kuantitas * $data->harga;
                            @endphp
                            <td>{{ $harga_total }}</td>
                            <td class="text-center">
                                <a href="/kedaiStockKopi/detail/{{ $data->namaProduk }}" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>

        var nama = document.getElementById("namaProduk");
        var kategori = document.getElementById("kategori");
        
        document.getElementById("kuantitas").addEventListener("input", function(){
            document.getElementById("harga").value = this.value*2000;
        });
    </script>

@endforeach
@endsection