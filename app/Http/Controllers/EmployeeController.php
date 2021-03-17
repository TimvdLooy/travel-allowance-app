<?php

namespace App\Http\Controllers;

use App\Services\TravelAllowance;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getTravelAllowanceCsv(TravelAllowance $travelAllowance){
        return $travelAllowance->travelAllowanceCsv();
    }
}
