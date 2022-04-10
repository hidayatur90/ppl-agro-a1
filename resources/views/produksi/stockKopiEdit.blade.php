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
                                    <td style="color: green">{{ $p->total_stok }}</td>
                                @else
                                    <td style="color: red">{{ $p->total_stok }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            <div class="form-edit">
                <form method="post" action="/stockKopi/store">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    {{-- Stok --}}
                    {{-- <div class="row mb-3">
                        <label for="phone" class="col-form-label col-sm-4 col-md-3 col-xl-2"><strong>Jumlah Stok</strong></label>
                        <div class="col-sm-8 col-md-9 col-xl-10">
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok Kopi" autocomplete="off" required oninvalid="this.setCustomValidity('Stok harus angka')" oninput="this.setCustomValidity('')"/>
                            @if($errors->has('stok'))
                            <div class="text-danger">
                                {{ $errors->first('stok')}}
                            </div>
                        @endif
                        </div>
                    </div> --}}

   
                    <div class="row mb-3 justify-content-end mx-3 my-4">
                        <div class="col-sm-8 col-md-9 col-xl-10" style="text-align:end;">
                            <input type="submit" class="btn btn-success mx-3" value="Simpan">
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
@endsection