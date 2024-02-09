<?php

namespace App\Http\Controllers;

use App\Models\SoldHistory;
use App\Models\Car;
use Illuminate\Http\Request;

class SoldHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $sold_records = SoldHistory::with('car:id,car_name,car_brand,price,user_id','car.dealerProfile:id,user_id,company_name')->latest()->paginate(10);
        // return $sold_records;
       return view('sold-history.index',compact('sold_records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $carId = $request->carid;
        $car = Car::findOrFail($carId);
        if($car->is_sold==1){
            flash('This car is already marked as sold')->error()->important(); 
            return redirect('/cars');
        }
        return view('car.sold',compact('car'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $car = Car::findOrFail($request->car_id);
        if($car->is_sold==1){
            flash('This car is already marked as sold')->error()->important(); 
            return back();
        }
        $car->is_sold=1;
        $inputs = $request->input();
        $history = SoldHistory::create($inputs);
        $car->update();
        flash('Car '.$car->car_name.' successfully marked as sold at '.$history->sell_price)->success()->important(); 
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoldHistory  $soldHistory
     * @return \Illuminate\Http\Response
     */
    public function show(SoldHistory $soldHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoldHistory  $soldHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(SoldHistory $soldHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoldHistory  $soldHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoldHistory $soldHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoldHistory  $soldHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoldHistory $soldHistory)
    {
        //
    }
}
