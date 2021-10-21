<?php

declare(strict_types=1);

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

        //Grab the date from the DB date and change the format
        $date = Minner::pluck('created_at')->toArray();
        foreach ($date as $key => $value) {
            $date[$key] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
        }

        // Grab all the data from the DB and make it and array
        $payout = Minner::pluck('est_month_payment')->toArray();
        $balance = Minner::pluck('current_balance')->toArray();
        $m5a = Minner::pluck('m5a_est')->toArray();
        $x60a = Minner::pluck('x60a_est')->toArray();
        $x20a = Minner::pluck('x20a_est')->toArray();
        $f40a = Minner::pluck('f40a_est')->toArray();

        // Convert Est Monthy Payment from BTC to USD and make it an array
        $estpaymentInUSD = [];
        foreach ($payout as $key => $value) {
            $estpaymentInUSD[$key] = $value * $btc2usd;
        }

        // Convert the current balance from BTC to USD and make it an array
        $balanceInUSD = [];
        foreach ($balance as $key => $value) {
            $balanceInUSD[$key] = $value * $btc2usd;
        }

        return Chartisan::build()
            ->labels($date)
            ->dataset('Est Monthy Payment in BTC', $payout)
            ->dataset('Est Monthy Payment in USD', $estpaymentInUSD)
            ->dataset('Current Balance in BTC', $balance)
            ->dataset('Current Balance in USD', $balanceInUSD)
            ->dataset('M5a', $m5a)
            ->dataset('X60a', $x60a)
            ->dataset('X20a', $x20a)
            ->dataset('F40a', $f40a);
    }
}
