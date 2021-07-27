<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Minner;
use Illuminate\Support\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class DashboardChart extends BaseChart
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

        $balance = Minner::pluck('current_balance')->toArray();

        // Convert the current balance from BTC to USD and make it an array
        $balanceInUSD = [];
        foreach ($balance as $key => $value) {
            $balanceInUSD[$key] = $value * $btc2usd;
        }

        return Chartisan::build()
            ->labels($date)
            ->dataset('current_balance_in_USD', $balanceInUSD);
    }
}
