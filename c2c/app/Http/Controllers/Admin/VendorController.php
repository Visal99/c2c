<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; 
use App\User;



class VendorController extends Controller
{
    //
    public function index(){
        $users = User::where('type','front')->get();
        $data = array(
            "a" => $users
        );
        return view('admin.vendor.index',$data);
    }
    public function test(){
        return "test";
    }
   
}
