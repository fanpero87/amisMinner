<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Minner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MinnersController extends Controller
{
    public function index(){

        // $d = DB::table('minners')->value('created_at');
        // $d = Minner::pluck('created_at')->first();
        // $a = $d->dateFormat();
        // dd($d);
        // foreach($d as  $row)
        // {
        //     $a = Carbon::createFromFormat('Y-m-d H:i:s', $row)->format('d/m/Y');
        // }
        // dd($a);
        // foreach ($validated as $key => $value) {
        //     $account->{$key} = $value;
        // }

        return view('welcome');
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
