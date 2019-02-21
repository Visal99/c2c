<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
use App\User;
class FrontController extends Controller
{
    //
    public function index(){
        return view('front/index');
    }
    public function register(){
        return view('front/register');
    }

    public function register_store(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|min:2|max:5' ,
            'password'=> 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required',
            'email' => 'required|unique:users|email'
           
        ]);
        $path= NULL;
        if($request->file('profile')!=NULL)
        {
            $path = $request->file('profile')->store('profile');
          
        }
    
    
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profile = $path;
        $user->type= "front";
        $user->role = "front";
        $user->save();
        return redirect()->back()->with("status","Register Success !");
      
    }
    public function member_login_view(){
        return view('front.login');
    }

    public function member_login_check(Request $request){


        // dd($request->all());
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=>'required'
        ]);
        // dd($request->all());
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('post.index');
        }
        else{
            return redirect()->back()->with('msg','Your username & password incorrect');
        }

    }
    public function member_logout(){
        Auth::logout();
        return redirect('/');
    }
}
