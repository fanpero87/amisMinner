<?php

namespace App\Http\Controllers;


use App\Models\Minner;
use App\Charts\MinnersChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MinnersController extends Controller
{
    public function index()
    {

        //Grab the date from the DB and change the format
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

        // Create the Chart
        $chart = new MinnersChart;

        $chart->labels($date);

        $chart->dataset('Est Monthy Payment (BTC)', 'line', $payout);
        $chart->dataset('Current Balance (BTC)', 'line', $balance);
        $chart->dataset('Est BTC/day M5a', 'line', $m5a);
        $chart->dataset('Est BTC/day X60a', 'line', $x60a);
        $chart->dataset('Est BTC/day X20a', 'line', $x20a);
        $chart->dataset('Est BTC/day F40a', 'line', $f40a);


        return view('add-minner-data', compact('chart'));
    }

    public function store(Request $request)
    {
        /**
         *
         * Store Daily Data
         *
         */
        $data = new Minner;
        $data->est_month_payment = $request->est_month_payment;
        $data->current_balance = $request->current_balance;
        $data->m5a_est = $request->m5a_est;
        $data->x60a_est = $request->x60a_est;
        $data->x20a_est = $request->x20a_est;
        $data->f40a_est = $request->f40a_est;
        $data->save();

        /**
         *
         * Store Exchange Data
         *
         */

        // Api call to get get the value of a BTC
        $getrate = "https://api.alternative.me/v2/ticker/bitcoin/?convert=USD";
        $price = file_get_contents($getrate);
        $result = json_decode($price, true);
        $btc2usd = $result['data'][1]['quotes']['USD']['price'];

        // Get the latest valued saved from the DB
        $estpaymentInBTC = Minner::get('est_month_payment')->last();
        $balanceInBTC = Minner::get('current_balance')->last();

        // Convert values from BTC to USD
        $estpaymentInUSD = $btc2usd * $estpaymentInBTC['est_month_payment'];
        $balanceInUSD = $btc2usd * $balanceInBTC['current_balance'];

        // Store Data into Exchange DB
        DB::insert('insert into exchange (
            btc_price_in_USD,
            balance_in_USD,
            est_month_payment_in_USD,
            created_at,
            updated_at) values (?, ?, ?, ?, ?)', [$btc2usd, $balanceInUSD, $estpaymentInUSD, now(), now()]);


        return redirect()->route('minner.index');
    }
}
