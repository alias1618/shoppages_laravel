<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_account' => 
                array('required',
                        'string',
                        'max:255',
                        'min:4',
                        'regex:/^\w{4,10}$/',
        ),
            'user_email' => 'required|string|email|max:255|unique:users',
            'user_password' => 'required|string|min:4|confirmed',
            'user_name' => 'required|string|max:255',
            'user_add' => 'required|string|max:255',
            'user_phone' => 
                array(
                    'required',
                    'regex:/^[0]{1}[9]{1}[0-9]{8}$/'
                )    
        ]);
        $res = DB::table('users')->insert($data);
        dd($res);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    /*
    protected function create(array $data)
    {
        return User::create([
            'user_account' => $data['user_account'],
            'user_email' => $data['user_email'],
            'user_password' => Hash::make($data['user_password']),
            'user_name' => $data['user_name'],
            'user_phone' => $data['user_phone'],
            'user_add' => $data['user_add'],
            'role_id' => $data['role_id'],
            
            
        ]);
        
    }
    */
    //$date->save();
/*
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['account', 'email', 'password', 'name', 'phone', 'add', 'role_id']));
        
        auth()->login($user);
        
        return redirect()->to('/games');
    }
    */
/*
    public function store(Request $request)
    {
        $user = new UserEdit;

        //$user->name = $request->name;
        $user->First_Name = "foo";
        $user->Last_Name = "bar";

        $user->save();

        return $user;
    }
    */

    public function register(Request $request){
        /*
        $input = [
        'user_account'=>123456,
        'user_email'=>'123456@gmail.com',
        'user_password'=>123456,
        'user_name'=>123456,
        'user_phone'=>'0910123456',
        'user_add'=>'123456',
        'role_id'=>1,
        //'rememberToken'=>request()->_token
    ];
    */
    
        $validator = Validator::make($request->all(),[
            'user_account'  => 'required|unique:users|max:30|min:4|regex:/^\w{4,10}$/',
            'user_email'    => 'required|string|email|max:50|unique:users',
            'user_password' => 'required|string|min:4|confirmed',
            'user_name'     => 'required|string|max:20',
            'user_phone'    => 'required|regex:/^[0]{1}[9]{1}[0-9]{8}$/',
            'user_add'      => 'required'
        ]);

        if ($validator->fails()){
            return redirect('register')
                            ->withErrors($validator)
                            ->withInput();
        }
    

    $input = ['user_account'=>request()->user_account,
                'user_email'=>request()->user_email,
                'user_password'=>Hash::make(request()->user_password),
                'user_name'=>request()->user_name,
                'user_phone'=>request()->user_phone,
                'user_add'=>request()->user_add,
                'role_id'=>request()->role_id,
                //'rememberToken'=>request()->_token
            ];

        //$input = request()->all();
            //echo $data;
        $res = DB::table('users')->insert($input);
        dd($res);
    }
}
