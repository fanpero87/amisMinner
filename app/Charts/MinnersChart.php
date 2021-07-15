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
        sleep(1);

        $date = Minner::pluck('created_at')->toArray();

        $payout = Minner::pluck('est_month_payment')->toArray();
        $balance = Minner::pluck('current_balance')->toArray();
        $m5a = Minner::pluck('m5a_est')->toArray();
        $x60a = Minner::pluck('x60a_est')->toArray();
        $x20a = Minner::pluck('x20a_est')->toArray();


        return Chartisan::build()
            ->labels($date)
            ->dataset('est_month_payment', $payout)
            ->dataset('current_balance', $balance)
            ->dataset('m5a_est', $m5a)
            ->dataset('x60a_est', $x60a)
            ->dataset('x20a_est', $x20a);
    }
}
