<?php

namespace App\Http\Controllers;


use App\Models\Minner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinnersController extends Controller
{
    public function index()
    {
        return view('add-minner-data');
    }

    public function store(Request $request)
    {
        // Store Daily Data
        $data = new Minner;

        $data->est_month_payment = $request->est_month_payment;
        $data->current_balance = $request->current_balance;
        $data->m5a_est = $request->m5a_est;
        $data->x60a_est = $request->x60a_est;
        $data->x20a_est = $request->x20a_est;

        $data->save();

        // Api call to get get the value of a BTC
        $getrate = "https://api.alternative.me/v2/ticker/bitcoin/?convert=USD";
        $price = file_get_contents($getrate);
        $result = json_decode($price, true);
        $btc2usd = $result['data'][1]['quotes']['USD']['price'];

        // Get the latest valued saved from the DB
        $estpaymentInBTC = Minner::get('est_month_payment')->last();
        $balanceInBTC = Minner::get('current_balance')->last();

        // Convert values from BTC to USD
        $estpaymentInUSD = $btc2usd * $estpaymentInBTC;
        $balanceInUSD = $btc2usd * $balanceInBTC;

        DB::insert('insert into exchange (
            btc_price_in_USD,
            balance_in_USD,
            est_month_payment_in_USD,
            created_at,
            updated_at) values (?, ?, ?, ?, ?)', [$btc2usd, $balanceInUSD, $estpaymentInUSD, now(), now()]);

        return redirect()->route('minner.index');
    }
}
