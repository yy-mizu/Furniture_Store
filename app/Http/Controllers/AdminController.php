<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
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

          return view('admin.dashboard' );
    }

    public function staff_list()
    {
        $stafflist = DB::table('admins')
        ->join('roles', 'roles.id', '=', 'admins.role_id')
        ->where('admins.id' , '=' , auth('admin')->user()->id)
        ->select('admins.*' , 'roles.name as rolename')
        ->get();

        // dd($stafflist);
       
        return view('admin.staffs', compact('stafflist'));
    }


    public function customer_list()
    {
        $customerlist = DB::table('customers')
        ->get();

        // dd($stafflist);
       
        return view('admin.customers', compact('customerlist'));
    }

    public function create_staff()
    {
        $rolelist = Role::select('id', 'name')->get();
        return view('Admin.staffcreate' , compact('rolelist'));
    }

    public function create_staff_process(Request $request)
    {
        dd($request);
    }

 
}
