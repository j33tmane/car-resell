<?php

namespace App\Http\Controllers;

use App\Models\DealerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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
        // return $dp;
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
        if(count($request->sl)>0)
        $request->merge(["social_link"=>json_encode($request->sl)]);
        $inputs = $request->except(['user_id']);

        $dp = DealerProfile::updateOrCreate(["user_id"=>$id],$inputs);
        $img_key=null;
        if($dp && $request->imageFile){
            $file = $request->imageFile;
            $filename = $file->hashName();
           try{
                if($dp->image_key && filter_var($dp->image_key, FILTER_VALIDATE_INT) == false)
                    Storage::disk('s3')->delete($dp->image_key);

                $img = Image::make($file)->resize(200,200,function ($constraint) {
                    $constraint->aspectRatio();
                });
                $resource = $img->stream()->detach();

                $key = 'users/'.$dp->id.'/'.$filename;
                $img_key = Storage::disk('s3')->put($key, $resource);
                $dp->image_key = $key ;
                $dp->save();
           }catch(\Exception $e){
            Storage::disk('s3')->delete($img_key);
            flash('Error occurred, Please try later')->error()->important();
           }
        }else{
            flash('Profile updated successfully.')->success()->important();
        }
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
