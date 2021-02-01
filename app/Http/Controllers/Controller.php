<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showDashboard()
    {
        return view('dashboard.index');
    }

    public function showPayPeriods()
    {
        return view('pay-periods.index');
    }

    public function showPayees()
    {
        return view('payees.index');
    }
}
