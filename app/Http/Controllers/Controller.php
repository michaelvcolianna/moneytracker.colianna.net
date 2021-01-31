<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\PayPeriod;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard()
    {
        if(PayPeriod::all()->count() < 1)
        {
            return redirect()->route('pay_periods');
        }

        return view('dashboard');
    }

    public function payPeriods()
    {
        return view('pay-periods');
    }
}
