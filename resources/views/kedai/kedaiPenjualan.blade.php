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
        {{-- <a href="#" onclick="showStuff('tambah', this); return false;" id="btn1" class="btn btn-secondary w-100 mt-3"><i class="bi bi-arrow-bar-down"></i> Tambah</a>
            <span id="tambah" style="display: none;">
            @include('kedai.kedaiPenjualanTambah')
        </span> --}}
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
                                <th>Kuantitas (gr)</th>
                                <th>Harga 100gr (Rp)</th>
                                <th>Harga Total (Rp)</th>
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
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->namaProduk }}</td>
                                <td>{{ $data->kategori }}</td>
                                <td>{{ $data->kuantitas }}</td>
                                {{-- <td>{{ $data->hargaPer100Gram }}</td> --}}
                                {{-- @if($data->kategori == "Biji Kopi")
                                    @while ($i <= $id)
                                        <td>Rp. {{ number_format($harga_biji[$i],2,',','.') }}</td>
                                        @php $harga_total = $data->kuantitas * $harga_biji[$i] /100;@endphp
                                    @endwhile
                                @else
                                    @while ($i <= $id)
                                        <td>Rp. {{ number_format($harga_bubuk[$i],2,',','.') }}</td>
                                        @endwhile
                                        @endif --}}
                                <td>Rp. {{ number_format($data->harga,2,',','.') }}</td>
                                @php $harga_total = $data->kuantitas * $data->harga/100;@endphp
                                <td>Rp. {{ number_format($harga_total,2,',','.') }}</td>
                                <td class="text-center">
                                    <a href="/penjualan/edit/{{ $data->idPenjualan }}" class="btn btn-warning">Edit</a>
                                </td>
                                @php
                                    $i += 1;
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>

        function showStuff(tambah, btn1) {
            document.getElementById(tambah).style.display = 'block';
            btn1.style.display = 'none';
        }

        // function hideStuff(tambah, btn1) {
        //     document.getElementById(tambah).style.display = 'none';
        //     btn1.style.display;
        //     showStuff();
        // }

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
            document.getElementById("harga").value = this.value*useValue()/100;
        });
    </script>

@endsection