<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Minner;
use Illuminate\Support\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

         //Grab the date from the DB and change the format
         $date= DB::table('exchange')->pluck('created_at')->toArray();
         foreach ($date as $key => $value) {
            $date[$key] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
        }

        // Grab all the data from the DB and make it and array
         $balance = DB::table('exchange')->pluck('balance_in_USD')->toArray();
         $btcprice = DB::table('exchange')->pluck('btc_price_in_USD')->toArray();

         return Chartisan::build()
         ->labels($date)
         ->dataset('Current Balance (USD)', $balance)
         ->dataset('BTC Price (USD)', $btcprice);
    }
}
