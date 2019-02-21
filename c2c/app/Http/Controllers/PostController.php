<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Products;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.member');
    }
    public function index(){
        $cat_root = Categories::where('parent_id',0)->get();
        $data = array(
            "cat_root" => $cat_root
        );
        return view('post.index',$data);
    }
    
    public function store(Request $request){

            $product= new Products;

            $product->name = $request->name;
            $product->cat_id=$request->category;
            $product->price = $request->price;
            $product->des = $request->detail;
            $product->user_id= Auth::user()->id;
            $product->save();

            // dd($request->all());
            // $this->validate($request,[
            //     'name' => 'required|min:2|max:5' ,
            //     ''=> 'required',
            //     'confirm_password' => 'required|same:password',
            //     'phone' => 'required',
            //     'email' => 'required|unique:users|email'
            //     //users is table
            // ]);
            // $path= NULL;
            // if($request->file('profile')!=NULL)
            // {
            //     $path = $request->file('profile')->store('profile');
              
            // }
            // Storage::put('profile',$request->profile);
            // $request->file('profile')->store('public/profile');
        
            // $user = new User;
            // $user->name = $request->name;
            // $user->password = Hash::make($request->password);
            // $user->email = $request->email;
            // $user->phone = $request->phone;
            // $user->profile = $path;
            // $user->type= "backend";
            // $user->role = $request->role;
            // $user->save();
    
            // return redirect('system/users');
        
    }
    
    public function get_sub_category($parent_id){
    
        $cat_root = Categories::where('parent_id',$parent_id )->get();
        return $cat_root;
    }
}

