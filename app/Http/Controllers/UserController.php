<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //

    public function profile(Request $request){
        $user = $request->user();
        return view('profile.index',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required', 
          ]);

        $userid = $request->user()->id;
        try{
            $user = User::find($userid);
            $user->name = $request->name;
            $user->save();
            flash('Profile Updated successfully.')->success()->important();
            
        }catch(\Exception $e){
            flash('Unable to update profile.')->error()->important();
        }
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'old_password' => 'required', 
            'new_password' => 'required', 
          ]);

          if(Hash::check($request->old_password, $user->password)) { 
            $user->fill([
             'password' => Hash::make($request->new_password)
             ])->save();
         
             flash('Password updated successfully.')->success()->important();
             return redirect()->back();
         
         } else {
            flash('Old password is wrong, please enter correct old password to verify user.')->error()->important();
             return redirect()->back();
         }
    }

    public function verificationPending(Request $request){
        $user = $request->user();
        if($user->getRawOriginal('active')==1)
            return redirect('/dashboard');
        return view('dashboard.verification_pending');
    }
}
