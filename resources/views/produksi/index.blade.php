@extends('layouts.app')
  
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
    <div id="layoutSidenav_content">
    <main>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Karyawan Produksi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tgl_lahir</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Tgl_lahir</th>
                                <th>Alamat</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($data as $key=>$value)                           
                            <tr>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->tgl_lahir }}</td>
                                <td>{{ $value->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
@endsection