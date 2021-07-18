<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Minner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class MinnersController extends Controller
{
    public function index(){

        // $dates = Minner::all();

        // foreach($dates as $date)
        // {

        // }
        // $d['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $d)->format('d/m/Y');
        // dd($d);


        // $a = Carbon::createFromFormat('Y-m-d H:i:s', $d)->format('d/m/Y');


        // $d = Minner::pluck('created_at')->first();
        // $a = $d->dateFormat();
        // dd($d);
        // foreach($d as  $row)
        // {

        // }
        // foreach ($validated as $key => $value) {
        //     $account->{$key} = $value;
        // }

        $response = Http::get('https://blockchain.info/ticker');
        $value=1;
        $toBtc = HTTP::get('https://blockchain.info/tobtc?currency=USD&value='.$value);



        $getrate = "https://api.alternative.me/v2/ticker/bitcoin/?convert=USD";

        $price = file_get_contents($getrate);
        $result = json_decode($price, true);

        // BTC in USD
        $result = $result['data'][1]['quotes']['USD']['price'];

         //Option 1
        // $quantity = 0.00982701;
        // $value = $quantity * $result;

        // Option 2

        $balance = Minner::pluck('current_balance')->toArray();
        $allValues=[];

        // dd($result);

        foreach($balance as $key => $data)
        {
            $allValues[$key] = $data * $result;
        }

        // dd($allValues);

        return view('welcome', compact('response', 'value'));
    }

    public function store(Request $request)
    {
        $data = new Minner;

        $data->est_month_payment = $request->est_month_payment;
        $data->current_balance = $request->current_balance;
        $data->m5a_est = $request->m5a_est;
        $data->x60a_est = $request->x60a_est;
        $data->x20a_est = $request->x20a_est;

        $data->save();

        return redirect()->route('chart.index');
    }
}
