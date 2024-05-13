<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Code;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\ProductImageRepository;

class ProductController extends Controller
{

    private $ProductImageRepository;

    public function __construct(ProductImageRepository $ProductImageRepository)
    {
        $this->ProductImageRepository = $ProductImageRepository;
    }
    public function product_list()
    {
        $productlist = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('product_image', 'product_image.product_id', '=', 'products.id')
        ->join('codes', 'codes.id', '=', 'products.code_id')
        ->join('admins', 'admins.id', '=', 'products.admin_id')
        ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('products.*' , 'categories.name as category')
        ->get();

// dd($productlist);
        $imagelist =DB::table('product_image')
                // ->join('products', 'product_image.product_id', '=', 'products.id')

                ->select('product_image.img')
            
                //  ->where( 'product_image.primary_img' , '=' , 'true')
                ->get();

        // dd($imagelist);
       
        return view('admin.products', compact('productlist' , 'imagelist'));
    }

    public function create_product()
    {
        $categorylist = Category::select('id', 'name')->get();
        $codelist = Code::select('id', 'name')->get();
        
        return view('Admin.productcreate' , compact('categorylist' , 'codelist'));
    }

    public function create_product_process(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     // other product fields
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for each image
        // ]);
        
        $uuid  = Str::uuid()->toString();
        // dd($request);
        // $image = $uuid.'.'.$request->image->extension();
        // $request->image->move(public_path('img/staff/'));

        $img= $request->image;
        // dd($img);
      

        $product = new Product();
        $product->name = $request->name;
        $product->uuid = $uuid;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->code_id = $request->code;
        $product->admin_id = auth('admin')->user()->id;
        $product->created_at = Carbon::now();
        // dd($product_data);
        $codename = DB::table('codes')->select('name')->where('codes.id' , '=' , $request->code)->get();
        $product_data  = DB::table('products')->get();
        // $p = DB::table('products')->where('name' , 'LIKE' , '%'.$codename[0]->name.'%')->get();
        // dd($codename[0]->name);
        if($product_data == "[]")
        {
            $product->product_code = $codename[0]->name."1";
            $product->save();
        }
        else{
            $product_codelist = DB::table('products')->where('product_code' , 'LIKE' , '%'.$codename[0]->name.'%')->get();
            // dd(count($p));
            $count = count($product_codelist) + 1;
            $product->product_code = $codename[0]->name.$count;
            $product->save();

        }
        
        // $person_data  = DB::table('people')->where('uuid', '=', $uuid) ->get();

     

        $response = $this->ProductImageRepository-> saveRecords($img , $uuid);
        return $response;
    }
}
