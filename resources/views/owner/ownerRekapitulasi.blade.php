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
            <div class="card-header text-start">
                <strong>Data Rekapitulasi Keuangan</strong> 
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Periode</th>
                            <th>Total Debit</th>
                            <th>Total Kredit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_kredit as $kredit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kredit->periode }}</td>
                            @foreach ($data_debit as $debit)
                                <td style="color: green">Rp. {{ number_format($debit->total_debit,2,',','.') }}</td>
                            @endforeach
                            <td style="color: red">Rp. {{ number_format($kredit->total_kredit,2,',','.') }}</td>
                            <td class="text-center">
                                <a href="/ownerRekapitulasiDetail/{{ $kredit->periode }}" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection