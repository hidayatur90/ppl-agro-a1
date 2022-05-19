@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
<div id="layoutSidenav_content">
    <style>
        strong, thead{
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <main>
    <div class="container-fluid px-4">
        <div class="card mt-3">
            @foreach($bahan_baku as $bahan)
            <div class="card-header text-start">
                <strong>Riwayat Pengguanaan {{ $bahan->namaBahan }}</strong> 
            </div>
            @php break; @endphp
            @endforeach
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan (Rp)</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bahan_baku as $bahan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bahan->updated_at }}</td>
                            <td>{{ $bahan->namaBahan }}</td>
                            @if($bahan->kuantitas > 0)
                                <td style="color: green">{{ $bahan->kuantitas }}</td>
                            @elseif ($bahan->kuantitas < 0)
                                <td style="color: red">{{ $bahan->kuantitas }}</td>
                            @else
                                <td style="color: black">{{ $bahan->kuantitas }}</td>
                            @endif
                            <td>Rp. {{ number_format($bahan->hargaSatuan,2,',','.') }}</td>
                            <td style="width: 300px;">{{ $bahan->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row mb-3 justify-content-end mx-3 my-4">
                    <div class="col-sm-8 col-md-9 col-xl-10" style="text-align:end;">
                        <a type="button" class="btn btn-secondary border" href="/ownerBahanBaku">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection