<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\DetailProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class ForecastController extends Controller
{
    public function indexOwnerBijiKopiDashboard() {
        $produk = DB::table('detail_bahan_baku')
            ->select(DB::raw("DATE_FORMAT(created_at, '%M - %Y') as bulan"), DB::raw('SUM(kuantitas) as total_stok'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $mounth = [];
        $stok = [];

        foreach ($produk as $p) {
            $mounth[] = $p->bulan;
            $stok[] = $p->total_stok;
        }

        $mounth_in_dashboard = array_slice($mounth, -5);
        $stok_in_dashboard = array_slice($stok, -5);

        return view('owner.home', compact('mounth_in_dashboard', 'stok_in_dashboard', 'mounth', 'stok'));
    }

    public function indexForcastBijiKopi($tahun) {
        $produk = DB::table('detail_produk')
            ->select(DB::raw("DATE_FORMAT(created_at, '%M - %Y') as bulan"),DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"), DB::raw('SUM(jumlahStok) as total_stok'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $years = [];
        $mounth = [];
        $stok = [];
        
        foreach ($produk as $p) {
            $years[] = $p->tahun;
            if($p->tahun == $tahun){
                $mounth[] = $p->bulan;
                $stok[] = $p->total_stok;
            }
        }
        
        $yearURL = $tahun;
        $years = array_unique($years);
        rsort(($years));

        return view('owner.ownerPrediksi', compact('years', 'yearURL', 'mounth', 'stok'));
    }

    public function exponentialSmoothing($periode, $dataset)
    {
        // Adaptive Response Rate Single Exponential Smoothing
        // F[periode ke-t] = (alpha[t] * X[t]) + ((1 - alpha[t]) * F[t])
        $X = $dataset; // dataset
        $F = []; // peramalan
        $e = []; // error/kesalahan
        $E = []; // error dihaluskan
        $AE = []; //error absolut
        $alpha = []; // konstanta smoothing
        $beta = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9]; // range alpha
        $PE = []; // persentase error
        $MAPE = []; // rata rata kesalahan

        // perhitungan peramalan menggunakan nilai beta mulai dari 0.1 sampai 0.9
        for($i = 0; $i < count($beta); $i++) {
            // inisialisasi
            $F[$i][0] = $e[$i][0] = $E[$i][0] = $AE[$i][0] = $alpha[$i][0] = $PE[$i][0] = 0;
            $F[$i][1] = $X[0];
            $alpha[$i][1] = $beta[$i];

            for($j = 1; $j < count($periode); $j++){
                // perhitungan peramalan untuk periode berikutnya
                $F[$i][$j + 1] = ($alpha[$i][$j] * $X[$j]) + ((1 - $alpha[$i][$j]) * $F[$i][$j]);

                // menghitung selisih antara nilai aktual dengan hasil peramalan
                $e[$i][$j] = $X[$j] - $F[$i][$j]; 

                // menghitung nilai kesalahan peramalan yang dihaluskan
                $E[$i][$j] = ($beta[$i] * $e[$i][$j]) + ((1 - $beta[$i]) * $E[$i][$j - 1]);

                // menghitung nilai kesalahan absolut peramalan yang dihaluskan
                $AE[$i][$j] = ($beta[$i] * abs($e[$i][$j])) + ((1 - $beta[$i]) * $AE[$i][$j - 1]);

                // menghitung nilai alpha untuk periode berikutnya
                $alpha[$i][$j + 1] = $E[$i][$j] == 0 ? $beta[$i] : abs($E[$i][$j] / $AE[$i][$j]);

                // menghitung nilai kesalahan persentase peramalan
                $PE[$i][$j] = $X[$j] == 0 ? 0 : abs((($X[$j] - $F[$i][$j]) / $X[$j]) * 100);
            }

            // menghitung rata-rata kesalahan peramalan
            $MAPE[$i] = array_sum($PE[$i])/(count($periode) - 1);
        }
        
        // mendapatkan index beta dengan nilai mape terkecil
        $bestBetaIndex = array_search(min($MAPE), $MAPE);

        // menyatukan semua hasil perhitungan dan menginputkan hasil peramalan periode berikutnya
        $result = [];
        for ($i = 0; $i <= count($periode); $i++) {
            $result[$i] = round($F[$bestBetaIndex][$i]);
        }
        
        // masukkan hasil, beta, dan mape tebaik ke array
        $final = [
            'result' => $result,
            'last' => end($result),
            'mape' => $MAPE[$bestBetaIndex],
        ];
        
        return $final;
    }

    public function result(Request $request, $id)
    {
        $outlet = Outlet::findOrFail($id);
        $stock = Stock::findOrFail($request->stock_id);

        // total sales orders grouped by month
        $totalSales = Order::selectRaw("DATE_FORMAT(orders.created_at, '%Y-%m') as periode, SUM(orders.amount) as total")
            ->where('stock_id', $stock->id)
            ->join('sales', 'sales.id', '=', 'orders.sale_id')
            ->where('outlet_id', $outlet->id)
            ->groupBy('periode')->get();

        // all periode of sales
        $periode = Sale::selectRaw("DATE_FORMAT(sales.created_at, '%Y-%m') as periode")
            ->where('outlet_id', $outlet->id)
            ->groupBy('periode')->get();

        // check if product have sales
        $allSales = 0;
        $monthSales = [];
        foreach($totalSales as $data) {
            $allSales += $data['total'];
            $monthSales[] = $data['periode'];
        }
        if($allSales <= 0) {
            return back()->with('error', 'Produk masih belum pernah terjual!');
        }
        if(count($monthSales) <= 1) {
            return back()->with('error', 'Produk minimal harus terjual dalam 2 bulan!');
        }

        // sales per month for dataset
        $dataset = [];
        for($i=0; $i<count($periode); $i++) {
            for($j=0; $j<count($totalSales); $j++) {
                if($periode[$i]['periode'] == $totalSales[$j]['periode']){
                    $dataset[$i] = intval($totalSales[$j]['total']);
                    break;
                }else{
                    $dataset[$i] = 0;
                }
            }
        }
        
        // get periodes to array
        $month = [];
        for ($i = 0; $i <= count($periode); $i++) {
            if ($i < count($periode)) {
                $month[$i] = $periode[$i]['periode'];
            }
            else {
                $nextMonth = date('Y-m', strtotime("+1 month", strtotime(date($periode[$i-1]['periode']))));
                $month[$i] = $nextMonth;
            }
        }
        
        // result
        $exponentialSmoothing = $this->exponentialSmoothing($periode, $dataset);

        $forecast = $exponentialSmoothing['result'];
        $last = $exponentialSmoothing['last'];
        $mape = round($exponentialSmoothing['mape']);

        $ingredient = Ingredient::where('product_id', $stock->product->id)->get();
        return view('forecast.result',compact('outlet','stock','month','dataset','forecast','last','mape','ingredient'));
    }

}
