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
        @include('kedai.kedaiPenjualanTambah')
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
                            <th>Kategori</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($data_penjualan as $data)
                        <tr>
                            @if ($i == $id)
                                @break
                            @endif
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->namaProduk }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->kuantitas }}</td>
                            <td>{{ $data->harga }}</td>
                            @php
                                $harga_total = $data->kuantitas * $data->harga;
                            @endphp
                            <td>{{ $harga_total }}</td>
                            <td class="text-center">
                                <a href="/penjualan/edit/{{ $data->namaProduk }}" class="btn btn-warning">Edit</a>
                            </td>
                            @php
                                $i++;
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        var nama = document.getElementById('namaProduk');
        var kategory = document.getElementById('kategori');
        function useValue() {
            var list_price = new Array;;
            var nama2 = nama.value;
            var kategory2 = kategory.value;
            const data = @json($data_produk);
            const myObj = JSON.parse(JSON.stringify(data));
            for(var i in myObj) {
                if(nama2 == myObj[i]['namaProduk'] && kategory2 == myObj[i]['kategori']){
                    list_price.push(myObj[i]["harga"]);
                }
            }
            var price = list_price.slice(-1)[0];
            return price;
        }
        nama.onchange = useValue;  
        nama.onblur = useValue;
        kategory.onchange = useValue;  
        kategory.onblur = useValue;
    
        document.getElementById("kuantitas").addEventListener("input", function(){
            document.getElementById("harga").value = this.value*useValue();
        });
    </script>

@endsection