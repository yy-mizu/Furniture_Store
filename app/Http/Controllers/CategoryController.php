<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category_list()
    {
        $categorylist = DB::table('categories')
        ->join('admins', 'categories.admin_id', '=', 'admins.id')

        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('categories.*'  , 'admins.name as author_name')
        // ->where( 'product_image.primary_img' , '=' , '1' , 'AND' , 'products', 'product_image.product_id', '=', 'products.id'  )
        ->get();


        return view('admin.categories', compact('categorylist' ));
    }

    public function create_category()
    {
        return view('admin.categorycreate');
    }

    public function create_category_process(Request $request)
    {
        $uuid  = Str::uuid()->toString();
        $img = $uuid.'.'.$request->img->extension();
        $request->img->move(public_path('img/category'), $img);
        $category = new Category();
        $category->name = $request->name;
        $category->img = $img;
        $category->description = $request->description;
        $category->admin_id = auth('admin')->user()->id;
        $category->save();


        return redirect()->route('admin.categorylist');

    }
    public function edit_category($id)
    {
        $category_data = Category::find($id);
        // dd($category_data->name);
        return view('admin.categorycreate' , compact('category_data'));


    }
    public function edit_category_process(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect()->route('admin.categorylist');
    }

    public function delete_category($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categorylist');
    }
    
}
