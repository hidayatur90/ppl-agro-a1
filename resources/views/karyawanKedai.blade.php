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
                <strong>Data Karyawan</strong> 
            </div>
            <div class="card-body">
                <a href="/karyawanKedai/tambah" class="btn btn-success">Input Karyawan Baru</a>
                <br/>
                <br/>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
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
                            <td>{{ $k->namaKaryawan }}</td>
                            <td>{{ $k->noTelepon }}</td>
                            <td>{{ $k->alamat }}</td>
                            <td>{{ $k->status }}</td>
                            <td>
                                <a href="/karyawanKedai/edit/{{ $k->id }}" class="btn btn-warning">Edit</a>
<<<<<<< HEAD
                                {{-- <a href="/karyawanKedai/delete/{{ $k->id }}" class="btn btn-danger">Hapus</a> --}}
=======
                                <a href="/karyawanKedai/delete/{{ $k->id }}" class="btn btn-danger">Hapus</a>
>>>>>>> 69eeb489c59e6a0a74caa0c81397ddc722cb1351
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection