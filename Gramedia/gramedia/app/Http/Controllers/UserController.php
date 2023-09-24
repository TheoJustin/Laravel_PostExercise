<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function startup(){
        return view('startup');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function login_post(Request $request){
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }else{
            return back()->withErrors("Wrong credentials");
        }
    }

    public function register_post(Request $request){
        $rules = [
            'email' => 'required|email',
            'phone_number' => 'required|min:12',
            'username' => 'required|min:5|max:20',
            'password' => 'required|min:5|max:20',
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $data = [
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'guest',
            'books_owned' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        DB::table('users')->insert($data);

        return redirect()->route('login');
    }

    public function viewUsers(){
        // $users = DB::table('users')->select('*')->get();
        $users = User::paginate(20);
        return view('viewusers', compact('users'));
    }

    public function updateUsers($user_id){
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->route('viewUsers');
        }
        return view('updateusers', compact('user'));
    }

    public function updateUsersPut($user_id, Request $request){
        $user = User::find($user_id);

        $data = [
            'role' => $request->role,
        ];
        $user->update($data);
        return redirect()->route('viewUsers');
    }

}
