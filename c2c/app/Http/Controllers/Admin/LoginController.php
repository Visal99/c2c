<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function Index(){
        return view('admin.login.index');
    }
    public function login(Request $request){

        $this->validate($request,[
            'email'=> 'required|email',
            'password'=>'required'
        ]);
        // dd($request->all());
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('system/dashboard');
        }
        else{
            return redirect()->back()->with('msg','Your username & password incorrect');
        }

    }
    public function logout()
    {   
        Auth::logout();
        return redirect('system');
    }

}
