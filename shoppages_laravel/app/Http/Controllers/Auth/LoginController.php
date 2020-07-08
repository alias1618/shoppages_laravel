<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Hash;
use Hash;
use Session;
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

    public function login()
    {

        $type_account = Input::get('user_account');
        $type_password = Input::get('user_password');
        $validator = Validator::make(request()->all(), [
            'user_account'  => 'required|min:4',
            'user_password' => 'required'
        ]);
            
        if ($validator->fails()){
            return redirect('login')
                            ->withErrors($validator)
                            ->withInput();
        }


        if ($user = DB::table('users')
            ->where('user_account', '=', $type_account)
            ->first()){

            if(Hash::check($type_password, $user->user_password)){
                echo "success";
                Session::put('user_id', $user->user_id);
                return redirect('index');
                //return View('shop/test');
            }
            else{
                echo 'still not'.'<br>';
                echo '<br>';
                echo '$type_password'.'<br>'.$type_password.'<br>';
                echo '<br>';
                echo '$user->user_password'.'<br>'.$user->user_password.'<br>';
                echo '<br>';
                echo 'Hash'.'<br>'.Hash::make($type_password);
                        //輸入的資料不符合
                return Redirect::to('login')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));

                }
        }
        //return back()
        /*
        return redirect('login')
            ->withErrors(['fail'=>'Email or password is wrong!'])
            ->withInput();
        */
        //['fail'=>'Email or password is wrong!']


    }
}    
    
        /*
        $attempt = Auth::attempt(array('user_account' => $account,
        'password' => $password));
        if ($attempt) 
        {
         echo "Hi~".Auth::user()->name;
        }
         return Redirect::to('/login')
         ->withErrors(['fail'=>'Email or password is wrong!']);
         */


        /*
        if ($validate->passes()) {
            $attempt = Auth::attempt([
                'email' => $input['email'],
                'password' => $input['password']
            ]);
                /*
            if ($attempt) {
                //驗證成功
                return Redirect::intended('post');
            }
    
            //驗證失敗
            return Redirect::to('login')
                    ->withErrors(['fail'=>'Email or password is wrong!']);
                    
                    
        }
        */
        /*
        //輸入的資料不符合
        return Redirect::to('login')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
        /*
        $user = DB::table('users')->where('user_account',$input['user_account']);

        $password = ($input['password'],$user->password);



        return 'Hello'."".'user_account';
        */
    



