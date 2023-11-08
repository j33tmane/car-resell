<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\DealerProfile;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Spatie\QueryBuilder\Exceptions\InvalidSortQuery;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars =QueryBuilder::for(Car::class)
        // ->allowedIncludes(['claimUser'])
        ->allowedFilters(['brand','year','car_name'])
        ->latest()->paginate(10)->appends(request()->query());
        return view('car.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $user = $request->user();
        $dealers=null;
        if($user->hasRole('admin')){
            $dealers = DealerProfile::all();
        }else
        {
            $dealers = DealerProfile::where('user_id',$user->id)->get();
        }
        return view('car.create',compact('dealers'));
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
        $user = $request->user();
        try{
            $inputs = $request->all();
            $car = Car::create($inputs);
            flash('Care added succefuly')->success()->important(); 
            return back();
        }catch(\Exception $e){
            flash('Something went wrong.<br><strong>Error</strong>: '.$e->getMessage())->error()->important(); 
            return back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $user = $request->user();
        $car = Car::find($id);
        
        if($car){
            $dealers=null;
            if($user->hasRole('admin')){
                $dealers = DealerProfile::all();
            }else
            {
                $dealers = DealerProfile::where('user_id',$user->id)->get();
            }
            return view('car.edit',compact('car','dealers'));
        }else{
            flash('Car Not Found')->success()->important(); 
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $user = $request->user();
        $car = Car::find($id);
        if($car){
            $inputs= $request->all();
            $car->update($inputs);
            flash('Car updated successfuly')->success()->important(); 
            return back();
        }else{
            flash('Car Not Found')->error()->important(); 
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
