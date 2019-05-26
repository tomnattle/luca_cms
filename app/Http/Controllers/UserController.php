<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use Hash;
use App\UserExtra;
use App\User;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\ResetPassword;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $module = 'user';

    public function profile(Request $request){
        return View('user.profile', [
            'user' => $request->user()->getExtra()
        ]);
    }

    public function secure()
    {
        return View('user.secure', []);
    }

    public function resetPassword(ResetPassword $request)
    {
        $user = Auth::user();
        Hash::check($request->input('old_password'), $user->password);
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/home/users/secure')->with('success', '');;
    }

    public function profileUpdate(UpdateProfile $request)
    {
        $fields = ['en_name','nick','address','born_address','major','school','age','sex','degree','marry','mail','weixin','phone','qq','language'];
        $user = $request->user();
        $userEx = UserExtra::findOrFail($user['id']);

        $updates = [];

        $flag = 0;
        foreach ($fields as $field) {
            if($request->has($field) && ($request->input($field) != $userEx->{$field})){
                $flag = 1;
                $updates[$field] = $userEx->{$field} . '->' . $request->input($field);
                $userEx->{$field} = $request->input($field);
            }
        }
        if($request->has('name')) {
            $flag_user = 0;
            if($request->input('name') != $user->name){
                $flag_user = 1;
                $user->name = $request->input('name');
            }
            if($flag_user)
                $user->save();
        }
        if($flag){
            echo 'user[' . $userEx['u_id'] . '], updates extra:' . implode('|', $updates);
            Log::info('user[' . $userEx['u_id'] . '], updates extra:' . implode('|', $updates));
        }
        $userEx->save();
        return redirect('/home/users/profile');
    }

    public function homePage(Request $request, $user_id)
    {
        $user = $userEx = UserExtra::findOrFail($user_id);
        
        return View('front.user.homepage', [
            'user' => $user
        ]);
    }
}
