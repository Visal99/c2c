<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; 
use App\User;



class UserController extends Controller
{
    //
    public function Index(){
        $users = User::where('type','backend')->get();
        $data = array(
            "a" => $users
        );
        return view('admin.user.index',$data);
    }
    public function Create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
        // INSERT INTO user (name,pass) VALUES ('data','123')
        
        
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|min:2|max:5' ,
            'password'=> 'required',
            'confirm_password' => 'required|same:password',
            'phone' => 'required',
            'email' => 'required|unique:users|email'
            //users is table
        ]);
        $path= NULL;
        if($request->file('profile')!=NULL)
        {
            $path = $request->file('profile')->store('profile');
          
        }
        // Storage::put('profile',$request->profile);
        // $request->file('profile')->store('public/profile');
    
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profile = $path;
        $user->type= "backend";
        $user->role = $request->role;
        $user->save();

        return redirect('system/users');
    }
}
