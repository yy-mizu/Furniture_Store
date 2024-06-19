<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Product_Image;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function account()
    {
        return view('customer.login');
    }


public function register(Request $request)
{

    // dd($request);
    $validator = Validator::make($request->all(), [
        'name' => [
            'required',
            Rule::unique('customers')->ignore($request->id),
        ],
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => [
            'required',
            Rule::unique('customers')->ignore($request->id),
        ],
        'phone' => 'required|numeric',
        'password1' => 'required|string|min:4',
       
    ],
    [
        'name.required' => 'The name field is required.',
        'name.unique' => 'The name has already been taken.',
        'image.required' => 'Please upload an image.',
        'image.image' => 'The uploaded file must be an image.',
        'image.max' => 'The image size should not exceed 2MB.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'phone.required' => 'The phone number field is required.',
        'phone.numeric' => 'Please enter a valid numeric phone number.',
        
        'address.required' => 'The address field is required.',
        'password1.required' => 'The password field is required.',
        'password1.string' => 'Please enter a valid password.',
        'password1.min' => 'The password must be at least 8 characters long.',
]);

    if ($validator->fails()) {
        // Handle validation failure (e.g., return an error response)
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // dd($request->img);
    $uuid  = Str::uuid()->toString();
    $img = $uuid.'.'.$request->image->extension();
    $request->image->move(public_path('img/customer/profiles'), $img);

    $customer = new Customer();
    $customer->name = $request->name;
    
    $customer->uuid = $uuid;
    $customer->status = 'Active';
    $customer->image = $img;
    $customer->address = $request->address;
    $customer->phone = $request->phone;
    $customer->email = $request->email;
    $customer->password = bcrypt($request->password1);
   

    $customer->save();


    return redirect()->back()->with('success', 'Account creation is successful.');
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
        $category_list = Category::all();

        
        $grid_items =  Category::limit(5)->withCount('products')
        ->get();

        


        return view('customer.home' , compact( 'grid_items',
         'bedlist', 'sofalist' , 'tablelist','cablist','lamplist','category_list'));
    }

   

    public function detail($id)
    {
        $product = Product::with(['category', 'photos'])->where('products.id', $id)->firstOrFail();

        // dd($product->category->id);
        $related_products =  Product::with('category', 'photos')
                                    ->where('category_id', $product->category->id)
                                    ->where('id', '!=', $id)
                                    ->limit(5)
                                    ->get();


        return view('customer.detail' , compact('product', 'related_products' ) );
    }

    public function shop()
    {
        // $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        // ->get();
    
       $products = Product::with('category', 'photos')->paginate(8);
    //    $products = Product::paginate(16);
       $categories = Category::all();
    //    dd($categories);
        return view('customer.shop', compact('products' , 'categories') );
    }
    public function blogs()
    {
        // $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        // ->get();
    
       $products = Product::with('category', 'photos')->get();

        return view('customer.blog', compact('products') );
    }

    public function about()
    {
        // $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        // ->get();
    
       $products = Product::with('category', 'photos')->get();

        return view('customer.story', compact('products') );
    }

    public function contact()
    {
        // $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        // ->get();
    
       $products = Product::with('category', 'photos')->get();

        return view('customer.contact', compact('products') );
    }
    public function cart()

    {
        return view('customer.cart');
    }
    public function addtocart(Request $request)
    {
        // $request->session()->flush();
       

        $id = $request->id;

        $products = Product::with(['category', 'photos'])->where('products.id','=', $id)->firstOrFail();

        $cart = session()->get('cart' , []);
        // dd( $cart[$id]);
       
        // dd($products->photos[0]->img);
   
        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']+= $request->quantity;
            // dd( $cart[$id])['quantity'];
        }else{
            $cart[$id] = [
                'product_id' => $products->id,
                'product_name' => $products->name,
                    'img' => $products->photos[0]->img,
                    'quantity' => $request->quantity,
                    'price' => $products->price,
                    
    
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    
    }

    

public function buyNow(Request $request )
{
    $id = $request->id;

    $product = Product::with(['category', 'photos'])->where('products.id','=', $id)->firstOrFail();

   
    $cart = session()->get('cart', []);

    $cart[$id] = [
        'product_id' => $product->id,
        'product_name' => $product->name,
        'img' => $product->photos[0]->img,
        'quantity' => $request->quantity,
        'price' => $product->price,
    ];

    session()->put('cart', $cart);

  
    return  view('customer.cart');
}

    public function updatecart(Request $request)
    {
        // dd($request->quantity);
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
  
    public function removecart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function clearcart()
    {
        
            $cart = session()->get('cart');
            if(isset($cart)) {
               session()->flush();
            }
            session()->flash('success', 'Product successfully removed!');
        
    }

    public function checkout(Request $request)
    {
        return view('customer.checkout');
    }

    public function checkoutprocess(Request $request)
    {
        $validator = Validator::make($request->all(), [
          
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
            'method' => 'required'
           
        ],
        [
            
            'name.required' => 'Buyer Name is required.',
            'name.string' => 'Name must be String type.',
            'phone.required' => 'The phone number field is required.',
            'phone.numeric' => 'Please enter a valid numeric phone number.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'address.required' => 'The address field is required.',
            'method.required' => 'The Payment Method field is required.',
            
    ]);

    if ($validator->fails()) {
        // Handle validation failure (e.g., return an error response)
        return redirect()->back()->withErrors($validator)->withInput();
    }
    Session::put('buyer_name', $request->name);
    Session::put('buyer_email', $request->email);
    Session::put('buyer_address', $request->address);
    Session::put('buyer_phone', $request->phone);
    Session::put('buyer_method', $request->method);
  

    if($request->method == 'cod'){
        return view('customer.home');
    }

    if($request->method == 'online') {
        return view('stripepayment');
    }
}

    public function changepic(Request $request)

  
    {
        // dd($request->image->extension());
        $validator = Validator::make($request->all(), [
          
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           
           
        ],
        [
            
            'image.image' => 'The uploaded file must be an image.',
            'image.max' => 'The image size should not exceed 2MB.',
            
    ]);

    if ($validator->fails()) {
        // Handle validation failure (e.g., return an error response)
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // dd($request->id);
    $uuid  = Str::uuid()->toString();
    $img = $uuid.'.'.$request->image->extension();
    $request->image->move(public_path('img/customer/profiles'), $img);

    $customer = Customer::find($request->id);
    $customer->image = $img;
    $customer->save();

    Session::forget('customer_image');
    Session::put('customer_image', $img);

    return redirect()->back();
    }
    
    public function filter(Request $request)
{

    $products = Product::with('category', 'photos')

    ->when($request->category != null , function($q) use ($request)
        {
            return $q->where('products.category_id', $request->category);
        })

        ->when($request->price == 'below500', function ($q) use ($request) {
            return $q->where('products.price', '<=', 500);
        })
        ->when($request->price == '500to1000', function ($q) use ($request) {
            return $q->whereBetween('products.price', [500, 1000]);
        })
        ->when($request->price == 'above1000', function ($q) use ($request) {
            return $q->where('products.price', '>', 1000);
        })
        ->when($request->sort == 'latest', function ($q) {
            return $q->orderBy('products.created_at', 'desc');
        })
        ->when($request->sort == 'oldest', function ($q) {
            return $q->orderBy('products.created_at', 'asc');
        })

        ->paginate(8);
        $categories = Category::all();

        return view('customer.shop', compact('categories', 'products'));


    // $query = Product::query();

    
    // if (isset($id)) {
    //     $category_id = $id;
       
    //     $query->where('category_id', $category_id);
    // }

   
    // $filtered_products = $query->with('category')->paginate(8);

    // $categories = Category::all();
   
    //     return view('customer.shop', compact('filtered_products' , 'categories') );


}

public function search(Request $request)
    {
        // dd($request->search);
        $query =  Product::with('category', 'photos');
        
        if ($request->has('search')) {
            $searchTerm = $request->input('search');

            $query->where('products.name', 'like', '%' . $searchTerm . '%');
              
                // ->orWhere('orders.name', 'like', '%' . $searchTerm . '%');
        }
    
        $products = $query->paginate(8);
       
    
       
        $categories = Category::all();

        return view('customer.shop', compact('categories', 'products'));
    }


}
