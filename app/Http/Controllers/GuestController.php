<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealerProfile;
use App\Models\Car;
use App\User;
use App\Models\Enquiry;
use App\Helpers\DataHelper;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Spatie\QueryBuilder\Exceptions\InvalidSortQuery;
use Spatie\QueryBuilder\AllowedFilter;

class GuestController extends Controller
{

    public function dealerPage(Request $request,$id){
        $dealer = DealerProfile::where('user_id',$id)->first();
        $brands = DataHelper::getDealerBrand($id);
        $years = DataHelper::getDealerYears($id);
        $fuels = DataHelper::getDealerFuels($id);
        if(!$dealer)
            return view('dealer-site.notfound');

        $cars = QueryBuilder::for(Car::class)
            // ->allowedIncludes(['claimUser'])
            ->allowedFilters(['brand','year','car_name','car_brand','fuel'])
            ->allowedSorts('price')
            ->where('user_id',$id)
            ->latest()->paginate(10)->appends(request()->query());

        return view('dealer-site.index',compact('dealer','cars','brands','years','fuels'));
    }

    public function carDetails(Request $request,$id){
        $car = Car::find($id);
        if(!$car)
            return view('dealer-site.notfound');
        $brands = DataHelper::getDealerBrand($car->user_id);
        $years = DataHelper::getDealerYears($car->user_id);
        $fuels = DataHelper::getDealerFuels($id);
        $rcars = DataHelper::getRelatedCars($car);
        
        $dealer = $car->dealerProfile;
        return view('dealer-site.details',compact('car','dealer','brands','years','fuels','rcars'));
    }

    public function submitEnquiry(Request $request,$id){
        $car = Car::find($id);
        if(!$car)
            return view('dealer-site.notfound');

        $inputs = $request->except(['car_id','mobile']);
        $eq = Enquiry::updateOrCreate(["car_id"=>$car->id,"mobile"=>$request->mobile],$inputs);
        flash('You enquiry for car '.$car->name.' submitted successfully.')->success()->important();
        return back();
    }

    public function searchCarByNumber(Request $request,$dealer_id){
        $car=null;
        $dealer = User::find($dealer_id);
     
        if($request->has('filter')){
            // $request->merge([])

            $car =QueryBuilder::for(Car::class)
            ->allowedIncludes(['images'])
            ->allowedFilters([AllowedFilter::exact('car_number')])
            ->where('user_id',$dealer_id)
            ->first();
        }
      
        return view('dealer-site.search_car',compact('car','dealer'));
    }

    public function dealerProfile(Request $request,$dealer_id)
    {
        $dealer = DealerProfile::where('user_id',$dealer_id)->first();
        $carsTotal = Car::where('user_id',$dealer_id)->count();
        $soldCars = Car::where('user_id',$dealer_id)->where('is_sold',1)->count();
        $soldCars+= $dealer->sold_cars;
        return view('dealer-site.dealer-profile',compact('dealer','carsTotal','soldCars'));
    }
    
}
