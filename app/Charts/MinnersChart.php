<?php

declare(strict_types=1);

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class MinnersChart extends Chart
{

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    // /**
    //  * Handles the HTTP request for the given chart.
    //  * It must always return an instance of Chartisan
    //  * and never a string or an array.
    //  */
    // public function handler(Request $request): Chartisan
    // {
    //     // // Api call to get get the value of a BTC
    //     // $getrate = "https://api.alternative.me/v2/ticker/bitcoin/?convert=USD";
    //     // $price = file_get_contents($getrate);
    //     // $result = json_decode($price, true);
    //     // $btc2usd = $result['data'][1]['quotes']['USD']['price'];

    //     //Grab the date from the DB and change the format
    //     $date = Minner::pluck('created_at')->toArray();
    //     foreach ($date as $key => $value) {
    //         $date[$key] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
    //     }

    //     // Grab all the data from the DB and make it and array
    //     $payout = Minner::pluck('est_month_payment')->toArray();
    //     $balance = Minner::pluck('current_balance')->toArray();
    //     $m5a = Minner::pluck('m5a_est')->toArray();
    //     $x60a = Minner::pluck('x60a_est')->toArray();
    //     $x20a = Minner::pluck('x20a_est')->toArray();
    //     $f40a = Minner::pluck('f40a_est')->toArray();

    //     return Chartisan::build()
    //         ->labels($date)
    //         ->dataset('Est Monthy Payment (BTC)', $payout)
    //         ->dataset('Current Balance (BTC)', $balance)
    //         ->dataset('Est BTC/day M5a', $m5a)
    //         ->dataset('Est BTC/day X60a', $x60a)
    //         ->dataset('Est BTC/day X20a', $x20a)
    //         ->dataset('Est BTC/day F40a', $f40a);
    // }
}
