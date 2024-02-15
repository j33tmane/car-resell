<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Spatie\QueryBuilder\Exceptions\InvalidSortQuery;

class DealerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['role_or_permission:car-delete'])->only('destroy');
    }

    public function index(){
        $dealers =QueryBuilder::for(User::class)
        // ->allowedIncludes(['claimUser'])
        ->allowedFilters(['email','username'])
        ->whereHas('roles',function($query){
            $query->where('name','dealer');
        })
        ->latest()->paginate(10)->appends(request()->query());
        return view('dealer.index',compact('dealers'));
    }

    public function toggleStatus(Request $request,$uid)
    {
        $user = User::find($uid);
        $user->active = $user->getRawOriginal('active')==1?0:1;
        $user->save();
        return response()->json(["status"=>true,"state"=>$user->active,'message' => "Status has been changed"]);
    }
}
