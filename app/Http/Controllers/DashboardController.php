<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CountHelper;
class DashboardController extends Controller
{
    //

    public function index(Request $request){
        $user = $request->user();
        $enqCnt = CountHelper::getTotalEnquiry($user);
        $carsCnt = CountHelper::getTotalCars($user);
        $dpCnt = CountHelper::getTotalDealers($user);
        return view('dashboard.index',compact('enqCnt','carsCnt','dpCnt'));
    }
}
