@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarProduksi')
<div id="layoutSidenav_content">
    <style>
        .header, strong {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <main >
        @php $i = 0; @endphp
        @foreach($produk as $p)
            @if ($i > 0 )
                @php break; @endphp
            @else
                <div class="header text-center">
                    <h2 class="pt-3 px-4"><strong>Data Stok Coffee</strong></h2>
                    <h3 class="px-4" style="color: brown;"><strong>~{{ $p->namaProduk }}</strong></h3>
                    @php $i++; @endphp
                </div>
            @endif
        @endforeach
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card-body">
                    <table id="datatablesSimple" style="font-size: 20px">
                        <thead>
                            <tr>
                                <th><strong>Kategori</strong></th>
                                <th><strong>Stok (Kg)</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $p->kategori }}</td>
                                @if($p->stok >= 15)
                                    <td style="color: green">{{ $p->stok }}</td>
                                @else
                                    <td style="color: red">{{ $p->stok }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align:end;">
                        <a type="button" class="btn btn-dark border" href="/produkProduksi">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
