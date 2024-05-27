<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Code;
use App\Models\Product;
use App\Models\Product_Image;
use App\Models\Supplier;
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
        ->leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
        ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
        ->join('admins', 'admins.id', '=', 'products.admin_id')
        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('products.*' , 'categories.name as category' , 'product_image.img')
        ->orderByDesc('products.id')
        // ->where( 'product_image.primary_img' , '=' , '1' , 'AND' , 'products', 'product_image.product_id', '=', 'products.id'  )
        ->get();
// $test = convertCategoryToProductCode($productlist)
// dd($productlist);
        // $imagelist =DB::table('product_image')
        //          ->join('products', 'product_image.product_id', '=', 'products.id')

        //         ->select('product_image.*')
            
        //           ->where( 'product_image.primary_img' , '=' , '1' , 'AND' , 'products', 'product_image.product_id', '=', 'products.id'  )
        //         ->get();

        // dd($imagelist);
       
       
        return view('admin.products', compact('productlist' ));
    }

    public function create_product()
    {
        $categorylist = Category::select('id', 'name')->get();
      
        $supplierlist = Supplier::select('id', 'name')->get();
        
        return view('Admin.productcreate' , compact('categorylist'  , 'supplierlist'));
    }

    public function create_product_process(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     // other product fields
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for each image
        // ]);
        
        $uuid  = Str::uuid()->toString();
        $img= $request->image;
 
      

        $product = new Product();
        $product->name = $request->name;
        $product->uuid = $uuid;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->supplier_id = $request->supplier;
        $product->admin_id = auth('admin')->user()->id;
        $product->created_at = Carbon::now();

        //SAVING PRODUCT_CODE
        $codename =convertCategoryToProductCode( DB::table('categories')
                                                ->select('name')
                                                ->where('categories.id' , '=' , $request->category)
                                                ->get());
        $product_data  = DB::table('products')->get();

        if($product_data == "[]")
        {
            $product->product_code = $codename."1";
            $product->save();
        }
        else{
            $product_codelist = DB::table('products')->where('product_code' , 'LIKE' , '%'.$codename.'%')->get();
            // dd(count($p));
            $count = count($product_codelist) + 1;
            $product->product_code = $codename.$count;
            $product->save();

        }
        

        $response = $this->ProductImageRepository-> saveRecords($img , $uuid);
        return $response;
    }

    public function edit_product($id)
    {
        // dd($id);
        // $image = Product_Image::find($id);
        $productlist = Product::find($id);
        $imagelist = Product_Image::select('img')->where('id' , '=' , $id)->get();

        $categorylist = Category::select('id', 'name')->get();
    //    dd());
        $supplierlist = Supplier::select('id', 'name')->get();
      
       
        $categorydata = Category::find($id);

        

        return view('Admin.productcreate' , compact('productlist' , 'imagelist' ,'supplierlist'  , 'categorylist'  , 'categorydata' ) );
    }

    public function edit_product_process(Request $request)
    {
 
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->supplier_id = $request->supplier;
        $product->admin_id = auth('admin')->user()->id;
        $product->updated_at = Carbon::now();

        //SAVING PRODUCT_CODE
        $category = DB::table('categories')->select('name')
                               ->where('categories.id' , '=' , $request->category)
                               ->get();
        $codename =convertCategoryToProductCode($category[0]->name );
                                                
        $product_data  = DB::table('products')->get();

// dd($codename);



        if($product_data == "[]")
        {
            $product->product_code = $codename."1";
            $product->save();
        }
        else{
            $product_codelist = DB::table('products')->where('product_code' , 'LIKE' , '%'.$codename.'%')->get();
            // dd(count($p));
            $count = count($product_codelist) + 1;
            $product->product_code = $codename.$count;
            $product->save();

        }

        if($request->image != null)
        {
         $img= $request->image;
         $id = $request->id;
         $response = $this->ProductImageRepository-> updateRecords($img , $id);
         return $response;
        }
        else{
           return redirect()->route('admin.productlist');
        }
 
        
       
    }

    public function delete_product($id)

    {
        // dd($id);
        Product::destroy($id);
        return redirect()->route('admin.productlist');
    }

 
}
