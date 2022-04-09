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
        <div class="card mt-5">
            <div class="card-header text-start">
                <strong>Data Karyawan Produksi Kopi</strong> 
            </div>
            <div class="card-body">
                <a href="/karyawanProduksi/tambah" class="btn btn-success">Input Karyawan Baru</a>
                <br/>
                <br/>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($karyawan as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->namaKaryawan }}</td>
                            <td>{{ $k->noTelepon }}</td>
                            <td>{{ $k->alamat }}</td>
                            @if($k->status == 'Aktif')
                                <td style="color: green">{{ $k->status }}</td>
                            @else
                                <td style="color: red">{{ $k->status }}</td>
                            @endif
                            <td class="text-center">
                                <a href="/karyawanProduksi/edit/{{ $k->id }}" class="btn btn-warning my-2 mx-1">Edit</a>
                                <a href="/karyawanProduksi/detail/{{ $k->id }}" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection