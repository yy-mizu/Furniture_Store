<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_Image;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function account()
    {
        return view('customers.account');
    }

    public function home()
    
    {
        $bedlist = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
        // ->join('codes', 'codes.id', '=', 'products.code_id')
        ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
        // ->join('admins', 'admins.id', '=', 'products.admin_id')
        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('products.*' , 'categories.name as category' , 'product_image.img')
        ->where('categories.name' , '=' , 'bed')
        ->orderByRaw('CAST(SUBSTRING(products.product_code, 4) AS UNSIGNED) DESC')
            ->take(8)
            ->get();

            $sofalist = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
        // ->join('codes', 'codes.id', '=', 'products.code_id')
        ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
        // ->join('admins', 'admins.id', '=', 'products.admin_id')
        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('products.*' , 'categories.name as category' , 'product_image.img')
        ->where('categories.name' , '=' , 'sofa')
        ->orderByRaw('CAST(SUBSTRING(products.product_code, 4) AS UNSIGNED) DESC')
            ->take(8)
            ->get();


            $lamplist = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
        // ->join('codes', 'codes.id', '=', 'products.code_id')
        ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
        // ->join('admins', 'admins.id', '=', 'products.admin_id')
        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('products.*' , 'categories.name as category' , 'product_image.img')
        ->where('categories.name' , '=' , 'lamp')
        ->orderByRaw('CAST(SUBSTRING(products.product_code, 4) AS UNSIGNED) DESC')
            ->take(8)
            ->get();



            $tablelist = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
        // ->join('codes', 'codes.id', '=', 'products.code_id')
        ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
        // ->join('admins', 'admins.id', '=', 'products.admin_id')
        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('products.*' , 'categories.name as category' , 'product_image.img')
        ->where('categories.name' , '=' , 'table')
        ->orderByRaw('CAST(SUBSTRING(products.product_code, 4) AS UNSIGNED) DESC')
            ->take(8)
            ->get();



            $cablist = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
        // ->join('codes', 'codes.id', '=', 'products.code_id')
        ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
        // ->join('admins', 'admins.id', '=', 'products.admin_id')
        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('products.*' , 'categories.name as category' , 'product_image.img')
        ->where('categories.name' , '=' , 'cabinet')
        ->orderByRaw('CAST(SUBSTRING(products.product_code, 4) AS UNSIGNED) DESC')
            ->take(8)
            ->get();
        // ->where( 'product_image.primary_img' , '=' , '1' , 'AND' , 'products', 'product_image.product_id', '=', 'products.id'  )
        $category_list = Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet']);

        
        $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        ->get();


        return view('customer.home' , compact('grid_items' ,
         'bedlist', 'sofalist' , 'tablelist','cablist','lamplist','category_list'));
    }

   

    public function detail($id)
    {
        $product = Product::with(['category', 'photos'])->where('products.id', $id)->firstOrFail();



        return view('customer.detail' , compact('product' ) );
    }

    public function shop()
    {
        // $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        // ->get();
    
       $products = Product::with('category', 'photos')->get();

        return view('customer.shop', compact('products') );
    }

    
}
