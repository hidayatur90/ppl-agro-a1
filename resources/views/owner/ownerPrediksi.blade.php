@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarOwner')
<div id="layoutSidenav_content">
    <style>
        #scrollContainer{
            height: 300px;
            overflow-y: auto;
        }
        #chartContainer{
            height: 400px;
            width: 100%;
            position: relative;
        }

    </style>
    <main>
        <div class="container-fluid px-4 mt-3">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Prediksi Stock Kopi
                        </div>

                        <div class="card-body">
                            <div class="form-group mb-2">
                                <select id="year" class="form-control" style="width: 120px">
                                    <option selected hidden>{{ $yearURL }}</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="card-header">
                                <div id="chartContainer">
                                    <canvas id="myAreaChart" width="100%"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Table Bahan Baku
                </div>
                {{-- <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Sisa</th>
                                <th>Tanggal Input</th>
                                <th>Terakhir Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bahan_baku as $bahan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bahan->namaBahan }}</td>
                                @if($bahan->total_stok_bahan >= 5)
                                    <td style="color: green">{{ $bahan->total_stok_bahan }}</td>
                                @elseif($bahan->total_stok_bahan == 0)
                                    <td style="color: red">{{ $bahan->total_stok_bahan }} (Habis)</td>
                                @else
                                    <td style="color: red">{{ $bahan->total_stok_bahan }} (Hampir Habis)</td>
                                @endif
                                <td>{{ $bahan->created_at }}</td>
                                <td>{{ $bahan->last_updated }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script>

        var sortYear = document.getElementById('year');
        
        sortYear.addEventListener("input", function(){
            var strUser = this.value;
            var nextURL = 'http://127.0.0.1:8000/ownerPrediksi/'+ strUser;
            window.location.replace(nextURL);
        });

        new Chart(document.getElementById("myAreaChart"), {
        type: 'line',
        data: {
            labels: @json($mounth),
            datasets: [{
            label: "Stok Kopi ",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: @json($stok),
            }],
        },
        options: {
            maintainAspectRatio: false
        }
        });
    
    </script>
@endsection