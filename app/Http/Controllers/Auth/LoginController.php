<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//*********IMPORTANT******** */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login (Request $request)
    {

        // dd($request);
        $validatedData = $request -> validate(
            [
                'name' => 'required',
                'password' => 'required',
            ],

            [
                'name.required' => 'Username Field is Required.',
                'password.required' => 'Password Field is Required.',
            ],
        );

        $validatedData['password'] = bcrypt($validatedData['password']);
        $input = $request->all();
        $userdata = array('name' => $input['name'], 'password' => $input['password']);

        // dd($userdata);
        if($input['usertype'] == 'admin')
        {
            if(auth('admin')->attempt($userdata))
            {
                $user = auth('admin')->user();
                if($user->status =='Active')
                {
                    return redirect()->route('admin.dashboard');
                }
                else{
                    Auth::logout();
                    return redirect()->route('admin.login')->with('error' , 'You don\'t have Account Access!');
                }
            }

            else
            {
                // Auth::login();
                return redirect()->route('admin.login')->with('error' , 'Wrong Email and Password');
            }
        }


        if($input['usertype']=='customer'){
           
            if(auth('customer')->attempt(($userdata))){
                $user = auth('customer')->user();
                if($user->status == "Active"){
                    return redirect()->route('customer.home')->with('jsAlert', 'Welcome back!');;
                } 
                else{
                    Auth::logout();
                    return redirect()->route('customer.login')->with('error','You don\'t have Customer Account Access!');
                }
            }
            else{
                // Auth::logout();
                return redirect()->route('customer.login')->with('error','Wrong email and password.');
            }
        }
        else{
            
            return redirect('customer.login')->with('error','You don\'t have Account Access!');
        }
    }

    public function CustomerLogout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('customer.login');
    }

    public function AdminLogout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('admin.login');
    }
}
