<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\DealerProfile;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Spatie\QueryBuilder\Exceptions\InvalidSortQuery;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = $request->user();

        $cars =QueryBuilder::for(Car::class)
        ->allowedIncludes(['images'])
        ->allowedFilters(['brand','year','car_name']);

        if(!$user->hasRole('admin'))
            $cars = $cars->where('user_id',$user->id);

        $cars = $cars->latest()->paginate(10)->appends(request()->query());
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
        $brandurl = url('json/brands.json');

        if(env('APP_ENV')=="production")
            $brandurl = secure_url('json/brands.json');
 
      
        $dealers=null;
        if($user->hasRole('admin')){
            $dealers = DealerProfile::all();
        }else
        {
            $dealers = DealerProfile::where('user_id',$user->id)->get();
        }
        return view('car.create',compact('dealers','brandurl'));
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
            return redirect('/cars/'.$car->id.'/edit');
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
    public function show(Request $request,$id)
    {
        //
        $car = Car::find($id);
        return view('car.show',compact('car'));
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
        $brandurl = secure_url('json/brands.json');
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
            return view('car.edit',compact('car','dealers','brandurl'));
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

    public function uploadImage(Request $request){
        $car = Car::find($request->car_id);
        $path=null;
        // try{
            if($car && $request->imageFile){
                $path = Storage::disk('s3')->put('cars/user_'.$car->user_id.'/'.$car->id, $request->imageFile);
                $request->merge(["image_key"=>$path]);
                $inputs = $request->all();
                $img = CarImage::create($inputs);
                flash('Image uploaded successfuly')->success()->important(); 
            }else{
                flash('Car Not Found')->error()->important(); 
            }
        // }catch(\Exception $e){
        //     Storage::disk('s3')->delete($path);
        // }
        return back();
    }

    public function removeImage(Request $request,$img_id){
        $carImage = CarImage::find($img_id);
        $path=null;
        try{
            if($carImage){
                Storage::disk('s3')->delete($carImage->image_key);
                $carImage->delete();
                flash('Image deleted successfuly')->success()->important(); 
            }else{
                flash('Car Not Found')->error()->important(); 
            }
        }catch(\Exception $e){
            
        }
        return back();
    }

    
}
