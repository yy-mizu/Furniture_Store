<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function account()
    {
        return view('customers.account');
    }

    public function home()
    {
        $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        ->get();


        return view('customer.home' , compact('grid_items'));
    }

    public function shop()
    {
        // $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Chair' , 'Lamp' ,'Cabinet'])->withCount('products')
        // ->get();


        return view('customer.shop' );
    }
}
