<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Hash;
use Auth;
use Log;
use App\Exceptions\ApiException;
use App\Utilities\Encrypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;
    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/login');
    }

    public function ajaxLogin(Request $request){
        if($request->ajax()){
            try{
                if(!$request->has('data'))
                    throw new \Exception("param [data] not found", 1);
                $data = explode('||', Encrypt::DecryptWithOpenssl($request->input('data')));
                if(!is_array($data) && count($data) !== 2 ){
                    throw new Exception('param unvalid');
                }
                $email = $data[0];
                $password = $data[1];
                
                if(Auth::attempt(['email' => $email, 'password' => $password])){
                    $request->session()->put('user', Auth::user());
                    return Auth::user();
                }else{
                    throw new \Exception('账号或密码错误');
                }
            }catch(\Exception $e){
                throw new ApiException("登陆失败" . $e->getMessage());
            }
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
