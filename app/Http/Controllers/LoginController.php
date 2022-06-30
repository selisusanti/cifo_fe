<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use App\Constants\Constant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class LoginController extends Controller
{

    private $loginService;

    public function __construct(){
        $this->loginService = new LoginService();
    }

    /**
     * Check if Session is exist or not
     *
     * @return [view] 
    */
    public function isLoggedIn(){
        if(Session::get('access_token') !== null){
            Redirect::to('/profile')->send();
        }
        return view('login');
    }
    /**
     * @var object $request
     *  email
     *  password
    */
    public function login(Request $request){
        $user           = $request->get('email');
        $password       = $request->get('password');

        //Kalo password salah begitu hit api ini langsung ke redirect ke /
        $resp           = $this->loginService->login($user,$password);
        // on login success
        if ($resp->status) {
            // Token Access
            Session::put('access_token', $resp->data->token);
            Session::put('user', $resp->data->user);
            return redirect('/profile');
        }else{
            Session::flash('error', $resp->message);
            return redirect('/');
        }

    }

    /**
     * Flush all session and regenerate to clean old session data
     */
    public function logout(){
        $user = Session::get('user');
        Session::flush();
        Session::save();
        Session::regenerate(true);
        return redirect('/')
            ->with('success', 'Selamat! Akun telah berhasil logout');
    }

    /**
     * view profile
    */
    public function profile(){
        $profile           = $this->loginService->profile();
        return view('profile')->with('data', $profile);
    }

    public function getViewPassword(){
        return view('change-password');
    }


    public function resetPassword(Request $request) {

        $this->validate($request,[
            'password'                            => 'required|min:8|max:12|same:password_confirmation|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).+$/',
            'password_confirmation'               => 'required|min:8|max:12',
        ]);

        $profile           = $this->loginService->resetPassword($request->password,$request->password_confirmation);
        if($profile->code == '200'){
            Session::flash('success', "Update password sukses");
            return back();
        }else{
            Session::flash('error', $profile->message);
            return back();
        }
    }
}
