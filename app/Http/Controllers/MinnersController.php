<?php

namespace App\Http\Controllers;

use App\Models\Minner;
use App\Charts\MinnersChart;

use Illuminate\Http\Request;


class MinnersController extends Controller
{
    public function index(){

    	return view('welcome');
    }
}
