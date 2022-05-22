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

    public function indexForecastPasar($pick_produk, $tahun) {

        $produk = DB::select('SELECT DISTINCT(namaProduk) from produk');
        // total sales orders grouped by month
        if($tahun=="Keseluruhan"){
            $stok_kopi = DB::table('detail_penjualan')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(kuantitas) as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->join('produk', 'detail_penjualan.idProduk', '=', 'produk.id')
                ->where('produk.namaProduk', '=', $pick_produk)
                ->groupBy('produk.namaProduk',DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                ->orderBy('created_at','asc')
                ->get();
    
            // all periode of sales
            $periode = DB::table('detail_penjualan')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        } else{
            $stok_kopi = DB::table('detail_penjualan')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(kuantitas) as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->join('produk', 'detail_penjualan.idProduk', '=', 'produk.id')
                ->where([
                    ['produk.namaProduk', '=', $pick_produk],
                    [DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun]
                ])
                ->groupBy('produk.namaProduk',DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();

            // all periode of sales
            $periode = DB::table('detail_penjualan')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        }

        // check if product have sales
        $allStok = 0;
        $monthStok = [];
        foreach($stok_kopi as $data) {
            $allStok += $data->total;
            $monthStok[] = $data->periode;
        }
        if($allStok <= 0) {
            return back()->with('error', 'Produk masih belum pernah terjual!');
        }
        if(count($monthStok) <= 1) {
            return back()->with('error', 'Produk minimal harus terjual dalam 2 bulan!');
        }

        // sales per month for dataset
        $dataset = [];
        for($i=0; $i<count($periode); $i++) {
            for($j=0; $j<count($stok_kopi); $j++) {
                if($periode[$i]->periode == $stok_kopi[$j]->periode){
                    $dataset[$i] = intval($stok_kopi[$j]->total);
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
                $month[$i] = $periode[$i]->periode;
            }
            else {
                $nextMonth = date('Y-m', strtotime("+1 month", strtotime(date($periode[$i-1]->periode))));
                $month[$i] = $nextMonth;
            }
        }
        
        // result
        $exponentialSmoothing = $this->exponentialSmoothing($periode, $dataset);

        $forecast = $exponentialSmoothing['result'];
        $last = $exponentialSmoothing['last'];
        $mape = round($exponentialSmoothing['mape']);

        // year
        $yearsQuery = DB::table('detail_produk')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $years = [];
        
        foreach ($yearsQuery as $data) {
            $years[] = $data->tahun;
        }
        
        $produkURL = $pick_produk;
        $yearURL = $tahun;
        $years = array_unique($years);
        rsort(($years));

        return view('owner.ownerPrediksiPasar', compact('produk','stok_kopi','years', 'yearURL','produkURL', 'month','dataset','forecast','last','mape'));
    }

    // Forcast Pasar
    public function indexForecastBijiKopi($tahun) {
        // total sales orders grouped by month
        $bijiStr = "Biji Kopi";
        if($tahun=="Keseluruhan"){
<<<<<<< HEAD
            $totalSales = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(jumlahStok)*10000 as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
=======
            $biji_kopi = DB::table('detail_bahan_baku')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(kuantitas)*1000 as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->join('bahan_baku', 'detail_bahan_baku.idBahan', '=', 'bahan_baku.id')
                ->where('bahan_baku.namaBahan', 'like', '%'.$bijiStr.'%')
>>>>>>> 4072a5a6d91881e0c9d976b860525d263564ea78
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
    
            // all periode of sales
            $periode = DB::table('detail_bahan_baku')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        } else{
<<<<<<< HEAD
            $totalSales = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(jumlahStok*10000) as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun)
=======
            $biji_kopi = DB::table('detail_bahan_baku')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(kuantitas)*1000 as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->join('bahan_baku', 'detail_bahan_baku.idBahan', '=', 'bahan_baku.id')
                ->where([
                    ['bahan_baku.namaBahan', 'like', '%'.$bijiStr.'%'],
                    [DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun]
                ])
>>>>>>> 4072a5a6d91881e0c9d976b860525d263564ea78
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();

            // all periode of sales
            $periode = DB::table('detail_bahan_baku')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        }

        // check if product have sales
        $allSales = 0;
        $monthSales = [];
        foreach($biji_kopi as $data) {
            $allSales += $data->total;
            $monthSales[] = $data->periode;
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
            for($j=0; $j<count($biji_kopi); $j++) {
                if($periode[$i]->periode == $biji_kopi[$j]->periode){
                    $dataset[$i] = intval($biji_kopi[$j]->total);
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
                $month[$i] = $periode[$i]->periode;
            }
            else {
                $nextMonth = date('Y-m', strtotime("+1 month", strtotime(date($periode[$i-1]->periode))));
                $month[$i] = $nextMonth;
            }
        }
        
        // result
        $exponentialSmoothing = $this->exponentialSmoothing($periode, $dataset);

        $forecast = $exponentialSmoothing['result'];
        $last = $exponentialSmoothing['last'];
        $mape = round($exponentialSmoothing['mape']);

        // year
        $yearsQuery = DB::table('detail_produk')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $years = [];
        
        foreach ($yearsQuery as $data) {
            $years[] = $data->tahun;
        }
        
        $yearURL = $tahun;
        $years = array_unique($years);
        rsort(($years));

        return view('owner.ownerPrediksiStok', compact('biji_kopi','years', 'yearURL', 'month','dataset','forecast','last','mape'));
    }  
    
    // Forcast Pasar Kedai
    public function indexForecastPasarKedai($tahun) {
        // total sales orders grouped by month
        if($tahun=="Keseluruhan"){
            $totalSales = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(jumlahStok)*10000 as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
    
            // all periode of sales
            $periode = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        } else{
            $totalSales = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(jumlahStok*10000) as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();

            // all periode of sales
            $periode = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        }

        // check if product have sales
        $allSales = 0;
        $monthSales = [];
        foreach($totalSales as $data) {
            $allSales += $data->total;
            $monthSales[] = $data->periode;
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
                if($periode[$i]->periode == $totalSales[$j]->periode){
                    $dataset[$i] = intval($totalSales[$j]->total);
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
                $month[$i] = $periode[$i]->periode;
            }
            else {
                $nextMonth = date('Y-m', strtotime("+1 month", strtotime(date($periode[$i-1]->periode))));
                $month[$i] = $nextMonth;
            }
        }
        
        // result
        $exponentialSmoothing = $this->exponentialSmoothing($periode, $dataset);

        $forecast = $exponentialSmoothing['result'];
        $last = $exponentialSmoothing['last'];
        $mape = round($exponentialSmoothing['mape']);

        // year
        $yearsQuery = DB::table('detail_produk')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $years = [];
        
        foreach ($yearsQuery as $data) {
            $years[] = $data->tahun;
        }
        
        $yearURL = $tahun;
        $years = array_unique($years);
        rsort(($years));

        return view('kedai.kedaiPrediksiPasar', compact('totalSales','years', 'yearURL', 'month','dataset','forecast','last','mape'));
    }    

    // Forecase Stok Produksi
    public function indexForecastBijiKopiProduksi($tahun) {
        // total sales orders grouped by month
        if($tahun=="Keseluruhan"){
            $stok_kopi = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(jumlahStok) as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
    
            // all periode of sales
            $periode = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        } else{
            $stok_kopi = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"), DB::raw('SUM(jumlahStok) as total'), DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
                ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();

            // all periode of sales
            $periode = DB::table('detail_produk')
                ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as periode"))
                ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), "=", $tahun)
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
                ->orderBy('created_at','asc')
                ->get();
        }

        // check if product have sales
        $allStok = 0;
        $monthStok = [];
        foreach($stok_kopi as $data) {
            $allStok += $data->total;
            $monthStok[] = $data->periode;
        }
        if($allStok <= 0) {
            return back()->with('error', 'Produk masih belum pernah terjual!');
        }
        if(count($monthStok) <= 1) {
            return back()->with('error', 'Produk minimal harus terjual dalam 2 bulan!');
        }

        // sales per month for dataset
        $dataset = [];
        for($i=0; $i<count($periode); $i++) {
            for($j=0; $j<count($stok_kopi); $j++) {
                if($periode[$i]->periode == $stok_kopi[$j]->periode){
                    $dataset[$i] = intval($stok_kopi[$j]->total);
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
                $month[$i] = $periode[$i]->periode;
            }
            else {
                $nextMonth = date('Y-m', strtotime("+1 month", strtotime(date($periode[$i-1]->periode))));
                $month[$i] = $nextMonth;
            }
        }
        
        // result
        $exponentialSmoothing = $this->exponentialSmoothing($periode, $dataset);

        $forecast = $exponentialSmoothing['result'];
        $last = $exponentialSmoothing['last'];
        $mape = round($exponentialSmoothing['mape']);

        // year
        $yearsQuery = DB::table('detail_produk')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y') as tahun"))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m'), DATE_FORMAT(created_at, '%Y')"))
            ->orderBy('created_at','asc')
            ->get();

        $years = [];
        
        foreach ($yearsQuery as $data) {
            $years[] = $data->tahun;
        }
        
        $yearURL = $tahun;
        $years = array_unique($years);
        rsort(($years));

        return view('produksi.produksiPrediksiStok', compact('stok_kopi','years', 'yearURL', 'month','dataset','forecast','last','mape'));
    }
}
