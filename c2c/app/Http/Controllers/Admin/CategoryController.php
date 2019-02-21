<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Categories;

class CategoryController extends Controller
{
    // 
    public function index($id = 0)
    {
        $categories = Categories::where('parent_id',$id)->orderby('order','ASC')->get();
        $parent_name = 'List Category';
        $parent_id = 0;
        if($id !=0){
            $parent = Categories::find($id);
            $parent_name = $parent->name;
            $parent_id = $parent->id;
        }
        $data = array(
            'categories' => $categories,
            'parent_name'=> $parent_name,
            'parent_id' => $parent_id
        );
        return view('admin.category.index',$data);
        
    }

    public function create($id = 0)
    {
        $parent_name = 'List Category';
        $parent_id = 0;
        if($id !=0){
            $parent = Categories::find($id);
            $parent_name = $parent->name;
            $parent_id = $parent->id;
        }
        $data = array(
            
            'parent_name'=> $parent_name,
            'parent_id' => $parent_id
        );
        return View('admin.category.create', $data);

    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'icon' => 'required|mimes:jpeg,png'
        ]);
        $parent_id = $request->parent_id;
        $path = $request->file('icon')->store('category');
        $max = Categories::where('parent_id',$parent_id)->max('order');
        $parent_id = $request->parent_id;
        $cat = new Categories;
        $cat->name = $request->name;
        $cat->slug = $request->slug;
        $cat->icon = $path;
        $cat->order = ( $max + 1 );
        $cat->parent_id = $parent_id;
        $cat->save();
       
        $url = $parent_id == 0? '/system/category' : "/system/category/sub/$parent_id";

        return redirect($url); 
    
    }
    public function order($id,$order,$mode)
    {
        $new_order = $mode == "up" ? $order - 1 : $order + 1;
        Categories::where('order',$new_order)->where('parent_id',$cat->parent_id)->update(['order'=>$order]);
        Categories::where('id',$id)->update(['order'=> $new_order]);
        return redirect()->back();
        // dd("new: $new_order - order: $order - mode: $mode");
        
    }
}
