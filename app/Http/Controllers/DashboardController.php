<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        //Grab the date from the DB and change the format
        $date = DB::table('exchange')->pluck('created_at')->toArray();
        foreach ($date as $key => $value) {
            $date[$key] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
        }

        // Grab all the data from the DB and make it and array
        $balance = DB::table('exchange')->pluck('balance_in_USD')->toArray();
        $btcprice = DB::table('exchange')->pluck('btc_price_in_USD')->toArray();


        // Create the Chart
        $chart = new DashboardChart;

        $chart->labels($date);
        $chart->dataset('Current Balance (USD)', 'line', $balance)->options(['fill' => false, 'color' => '#172554']);
        $chart->dataset('BTC Price (USD)', 'line', $btcprice)->options(['fill' => false, 'color' => '#083344']);

        return view('dashboard', compact('chart'));
    }
}
