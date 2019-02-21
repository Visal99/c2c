<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; 
use App\Products;


class ProductController extends Controller
{
    public function Index(){
        $products = Products::get();
        $data = array(
            "a" => $products
        );
        return view('admin.product.index',$data);
    }
    //
   
}
