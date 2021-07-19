<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Minner;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use ConsoleTVs\Charts\BaseChart;

class MinnersChart extends BaseChart
{

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // Api call to get get the value of a BTC
        $getrate = "https://api.alternative.me/v2/ticker/bitcoin/?convert=USD";
        $price = file_get_contents($getrate);
        $result = json_decode($price, true);
        $btc2usd = $result['data'][1]['quotes']['USD']['price'];

        // sleep(1);

        //Grab the date from the DB date and change the format
        $date = Minner::pluck('created_at')->toArray();
        foreach($date as $key => $value)
        {
            $date[$key] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
        }

        // Grab all the data from the DB and make it and array
        $payout = Minner::pluck('est_month_payment')->toArray();
        $balance = Minner::pluck('current_balance')->toArray();
        $m5a = Minner::pluck('m5a_est')->toArray();
        $x60a = Minner::pluck('x60a_est')->toArray();
        $x20a = Minner::pluck('x20a_est')->toArray();

        // Convert the current balance from BTC to USD and make it an array
        $balanceInUSD=[];
        foreach($balance as $key => $value)
        {
            $balanceInUSD[$key] = $value * $btc2usd;
        }

        return Chartisan::build()
            ->labels($date)
            ->dataset('est_month_payment', $payout)
            ->dataset('current_balance', $balance)
            ->dataset('current_balance_in_USD', $balanceInUSD)
            ->dataset('m5a_est', $m5a)
            ->dataset('x60a_est', $x60a)
            ->dataset('x20a_est', $x20a);
    }
}
