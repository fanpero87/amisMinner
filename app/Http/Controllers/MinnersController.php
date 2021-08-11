<?php

namespace App\Http\Controllers;


use App\Models\Minner;
use Illuminate\Http\Request;

class MinnersController extends Controller
{
    public function index()
    {
        return view('add-minner-data');
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

        return redirect()->route('minner.index');
    }
}
