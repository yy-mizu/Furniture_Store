@extends('layouts.adminLayout')
@section('title', 'Dashboard | Products')

@section('admin-body-navbar-title', 'Products Management')

@section('admin-body')
    <div class="product-page">

        <div class="product-page-title">
            <h4>Product List</h4>

            <div class="products-filter">
                <form action="{{ route('searchProduct') }}" method="POST" class="search-form">
                    @csrf
                    <input type="text" name="search" placeholder="Search Products">
                    <button type="submit"><img src="{{asset('img/admin/glass.png')}}" style="width: 25px" alt=""></button>
                </form>
            </div>

            <button style="  border-radius: 0px 10px 10px 10px;" class="add-btn">
                <a href="{{ route('admin.product.create') }}">Add New Product</a>
            </button>
        </div>

        <div class="product-table-container">
            <table class="product-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">
                        <img src="{{ asset('img/admin/image.svg') }}" alt="">
                    </th>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Added-Date</th>
                    <th style="border-radius: 0px 10px 10px 0px;" colspan="2">Action</th>


                </tr>

{{-- @dd($productlist) --}}
                @foreach ($productlist as $product)
             
                        <tr>
                            {{-- <td>{{ $product->image }}</td> --}}

                            <td><img src="{{ asset('img/products/' . $product->img) }}" alt="" width="30px"></td>
                            {{-- @dd($image) --}}

                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at }}</td>

                            <td>
                                {{-- @dump($product) --}}
                                <a href="{{ url('/admin/product/edit/'.$product->id) }}">
                                    <img src="{{ asset('img/admin/edit.svg') }}" alt="" width="20px">
                                </a>
                                <a href="{{ url('/admin/product/delete/'.$product->id) }}">
                                    <img src="{{ asset('img/admin/trashbin.svg') }}" alt="" width="20px">
                                </a>
                            </td>
                        </tr>
           
                @endforeach

            </table>
            <div class="pagination">
                {{ $productlist->links() }}
            </div>
        </div>

    </div>
@endsection
