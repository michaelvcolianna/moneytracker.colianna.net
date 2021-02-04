<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\PayPeriod;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function showDashboard()
    {
        if(PayPeriod::all()->count() < 1)
        {
            // No dashboard to load without any pay periods
            return redirect()->route('pay-periods');
        }

        if(request()->has('date'))
        {
            $date = \DateTime::createFromFormat('Y-m-d', request()->date);
        }
        else
        {
            $date = $this->getDateFromRequest();
        }

        return view('dashboard.index', [
            'date' => $date,
        ]);
    }

    public function showPayPeriods()
    {
        return view('pay-periods.index');
    }

    public function showPayees()
    {
        return view('payees.index');
    }

    protected function getDateFromRequest()
    {
        $date = new \DateTime;

        if($date->format('w') != 5)
        {
            $date->modify('last friday');
        }

        $limit = 0;
        while(PayPeriod::where('date', $date->format('Y-m-d'))->count() == 0)
        {
            $date->modify('-1 week');

            // Don't look back further than 8 weeks
            if($limit > 4)
            {
                abort(404);
            }

            $limit++;
        }

        return $date;
    }
}
