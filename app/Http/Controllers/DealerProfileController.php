<?php

namespace App\Http\Controllers;

use App\Models\DealerProfile;
use Illuminate\Http\Request;

class DealerProfileController extends Controller
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
        $dp = DealerProfile::where('user_id',$user->id)->first();
        return view('dealer.profile-index',compact('dp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
      
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DealerProfile  $dealerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        $dp = DealerProfile::where("user_id",$id)->first();
        return view('dealer.profile-index',compact('dp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DealerProfile  $dealerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DealerProfile $dealerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DealerProfile  $dealerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $inputs = $request->except(['user_id']);
        $dp = DealerProfile::updateOrCreate(["user_id"=>$id],$inputs);
        flash('Profile updated successfully.')->success()->important();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DealerProfile  $dealerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DealerProfile $dealerProfile)
    {
        //
    }
}
