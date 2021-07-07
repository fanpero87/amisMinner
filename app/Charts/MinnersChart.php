<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Model\Minner;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class MinnersChart extends BaseChart
{

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        sleep(1);

        // $minners = [
        //     Minner::select('est_month_payment')->get()->first(),
        //     Minner::select('current_balance')->get()->first(),
        //     Minner::select('m5a_est')->get()->first(),
        // ];

        return Chartisan::build()
        ->labels(['July 03', 'July 04', 'July 05'])
        ->dataset('Est Monthly Payout', [0, 0.00868224, 0])
        ->dataset('Current Balance', [0, 0.005836691, 0])
        ->dataset('M5a Miner', [0, 0.00001588, 0])
        ->dataset('X60a Miner', [0, 0.00019525, 0])
        ->dataset('X20za Miner', [0, .00006569, 0]);
    }
}
