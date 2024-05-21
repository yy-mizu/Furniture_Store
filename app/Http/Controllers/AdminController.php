<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        $orderlist = DB::table('orders')
                     ->leftjoin('customers', 'customers.id', '=', 'orders.customer_id')
                     ->join('order_products' , 'order_products.order_id' , 'orders.id')
                     ->join('products'  , 'products.id', '=' , 'order_products.product_id')
                     ->select('orders.*' , 'products.name as productname' , 'order_products.quantity as order_quantity',
                            'order_products.created_at as date')
                     ->get();
          return view('admin.dashboard' , compact('orderlist') );
    }



    public function customer_list()
    {
        $customerlist = DB::table('customers')
        ->get();

        // dd($stafflist);
       
        return view('admin.customers', compact('customerlist'));
    }

    public function staff_list()
    {
        $stafflist = DB::table('admins')
        ->join('roles', 'roles.id', '=', 'admins.role_id')
        // ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('admins.*' , 'roles.name as rolename')
        // ->get()
        ->paginate(7);

        // dd($stafflist);
       
        return view('admin.staffs', compact('stafflist'));
    }

    public function create_staff()
    {
        $rolelist = Role::select('id', 'name')->get();
        return view('Admin.staffcreate' , compact('rolelist'));
    }

    public function create_staff_process(Request $request)
    {
        // dd($request->img);
        $uuid  = Str::uuid()->toString();
        $img = $uuid.'.'.$request->img->extension();
        $request->img->move(public_path('img/staff'), $img);

        $staff = new Admin();
        $staff->name = $request->name;
        $staff->age = $request->age;
        $staff->uuid = $uuid;
        $staff->status = 'Active';
        $staff->image = $img;
        $staff->address = $request->address;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->password = bcrypt($request->password);
        $staff->role_id = $request->role;

        $staff->save();


        return redirect()->route('admin.stafflist');
    }

    public function edit_staff($id)
    {
        $staff_data = Admin::find($id);
        $rolelist = Role::select('id', 'name')->get();
        // dd($category_data->name);
        return view('admin.staffcreate' , compact('staff_data' , 'rolelist'));


    }
    public function edit_staff_process(Request $request)
    {
        $staff = Admin::find($request->id);
        
        $staff->name = $request->name;
        $staff->age = $request->age;
        $staff->address = $request->address;
        $staff->role_id = $request->role;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->password = bcrypt($request->password);

        $staff->save();

        return redirect()->route('admin.stafflist');


    }

    public function delete_staff($id)
    {
        Admin::destroy($id);
        return redirect()->route('admin.stafflist');
    }


    public function supplier_list()
    {
        $supplierlist = DB::table('suppliers')
        
        ->select('suppliers.*')
        ->get();

        // dd($stafflist);
       
        return view('admin.suppliers', compact('supplierlist'));
    }

    public function create_supplier()
    {
        
        return view('Admin.suppliercreate');
    }

    public function create_supplier_process(Request $request)
    {
        // dd($request->img);
        $uuid  = Str::uuid()->toString();
        $img = $uuid.'.'.$request->img->extension();
        $request->img->move(public_path('img/supplier'), $img);


        $supplier = new Supplier();
        $supplier->name = $request->name;
       
        $supplier->status = 'Active';
        $supplier->img = $img;
        $supplier->uuid = $uuid;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
     

        $supplier->save();


        return redirect()->route('admin.supplierlist');
    }

    public function edit_supplier($id)
    {
        $supplier_data = Supplier::find($id);
      
        // dd($category_data->name);
        return view('admin.suppliercreate' , compact('supplier_data' ));


    }
    public function edit_supplier_process(Request $request)
    {
        $supplier = Supplier::find($request->id);
        
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
      

        $supplier->save();

        return redirect()->route('admin.supplierlist');


    }

    public function delete_supplier($id)
    {
        Supplier::destroy($id);
        return redirect()->route('admin.supplierlist');
    }




    //FOR ORDERS
    public function order_list()
    {
        $orderlist = DB::table('orders')
                     ->leftjoin('customers', 'customers.id', '=', 'orders.customer_id')
                     ->join('order_products' , 'order_products.order_id' , 'orders.id')
                     ->join('products'  , 'products.id', '=' , 'order_products.product_id')
                     ->select('orders.*' , 'products.name as productname' , 'order_products.quantity as order_quantity',
                            'order_products.created_at as date')
                     ->get();
        
        // $order_product =DB::table('order_products')
        //                 ->leftJoin('products' , 'products.id', '=' , 'order_products.product_id') 
        //                 ->select('order_products.*')
        //                 ->get();

                    

        return view('admin.orderlist' ,compact('orderlist'));
    }
    
 
}
