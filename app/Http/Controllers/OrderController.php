<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order as ModelsOrder;
use App\Models\OrderProduct;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Stripe\Climate\Order;

class OrderController extends Controller
{
    public function saveOrderDetail(){
        // dd(\Illuminate\Support\Facades\Session::get('buyer_name'));
    //    dd(session('customer_id'));
        $order = New ModelsOrder();

        if(session('customer_id') == null)
        {
        $randomNumber = mt_rand(11110000000, 111199999999); // Generate a random 10-digit number
        $uniqueIdentifier = (int)$randomNumber;
        $customer = new Customer();
        $customer->id = $uniqueIdentifier;
        $customer->name = 'OTCustomer_' . session('buyer_name');
        $customer->email = 'OTCustomer_' . session('buyer_email');
        $customer->phone = session('buyer_phone');
        $customer->address = session('buyer_address');
        $customer->password = bcrypt($uniqueIdentifier);
        $customer->image = 'image_' . $uniqueIdentifier . '.jpg';;
        $customer->uuid = 'uuid_' . $uniqueIdentifier;
        $customer->status = 'One-Time';
        $customer->save();
        $order->customer_id =  $uniqueIdentifier;
        }
        else{
            $order->customer_id =  session('customer_id');
        }

        
        $order->payment_method =  session('buyer_method');
        $order->buyer_name =  'OTCustomer_' . session('buyer_name');
        $order->buyer_email = 'OTCustomer_' . session('buyer_email');
        $order->delivery_address =  session('buyer_address');
        $order->buyer_phone =  session('buyer_phone');
      ;

        $totalPrice=0;
        foreach (session('cart') as $id => $details) {
            $totalPrice += $details['price'] * $details['quantity'];
        }
        $order->total_price = $totalPrice;
        $order->status = '1';
        $order->save();

        // Save order products
foreach (session('cart') as $id => $details) {
    $orderProduct = new OrderProduct();
    $orderProduct->order_id =  $order->id;  
    $orderProduct->product_id = $id;
    $orderProduct->quantity = $details['quantity'];
    $orderProduct->price = $details['price'];

    // Save the order product
    $orderProduct->save();
}
FacadesSession::forget(['buyer_address', 'buyer_name', 'buyer_phone', 'buyer_email','buyer_method','cart']);
return redirect()->route('customer.home')->with('thanks', 'Thanks for the purchase! Your order will arrive within 7 days.');;
    }


    public function edit_order(Request $request)
    {
       
$order = ModelsOrder::find($request->id);
$order->status = $request->status;
$order->save();
return redirect()->back();

    }

    public function filter(Request $request)
    {
        // dd($request->date);
        $todayDate = Carbon::now()->format('Y-m-d');
        $orderlist = DB::table('orders')
        ->leftJoin('customers', 'customers.id', '=', 'orders.customer_id')
        ->join('order_products', 'order_products.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_products.product_id')
        ->select(
            'orders.id', 
            'customers.name as buyer_name',
            DB::raw('GROUP_CONCAT(CONCAT(products.name, " (", order_products.quantity, ")") SEPARATOR ", ") as product_details'),
            'orders.created_at as date',
            'orders.status'
        )
        ->groupBy('orders.id', 'customers.name', 'orders.created_at', 'orders.status')
                    
        ->when($request->date != null , function($q) use ($request)
        {
            return $q->whereDate('orders.created_at', $request->date);
        }, function($q) use ($todayDate)
        {
            return $q->where('orders.created_at','<=',$todayDate);
        })

        ->when($request->status != null , function($q) use ($request)
        {
            return $q->where('orders.status', $request->status);
        })

        // ->when($request->status == 'all' , function($q) use ($request)
        // {
        //     return $q->whereIn('orders.status', ['0','1', '2']);
        // })

        ->when($request->sort == 'latest' , function($q) use ($request)
        {
            return $q->orderByDesc('orders.id');
        })

        ->paginate(10);
        return view('admin.orderlist' ,compact('orderlist'));


       

    }

    public function search(Request $request)
    {
        // dd($request->search);
        $query =  DB::table('orders')
        ->leftJoin('customers', 'customers.id', '=', 'orders.customer_id')
        ->join('order_products', 'order_products.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_products.product_id')
        ->select(
            'orders.id', 
            'customers.name as buyer_name',
            DB::raw('GROUP_CONCAT(CONCAT(products.name, " (", order_products.quantity, ")") SEPARATOR ", ") as product_details'),
            'orders.created_at as date',
            'orders.status'
        )
        ->groupBy('orders.id', 'customers.name', 'orders.created_at', 'orders.status');
        
        if ($request->has('search')) {
            $searchTerm = $request->input('search');

            $query->where('products.name', 'like', '%' . $searchTerm . '%')
                ->orWhere('customers.name', 'like', '%' . $searchTerm . '%');
                // ->orWhere('orders.name', 'like', '%' . $searchTerm . '%');
        }
    
        $orderlist = $query->paginate(10);
       
    
        return view('admin.orderlist' ,compact('orderlist'));
    }

}
