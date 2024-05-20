@extends('layouts.adminLayout')
@section('title', 'Dashboard | Categories')

@section('admin-body-navbar-title', 'Category Management')

@section('admin-body')
    <div class="category-page">

        <div class="category-page-title">
            <h4>Product List</h4>

            <button style="  border-radius: 0px 10px 10px 10px;">
                <a href="{{ route('admin.category.create') }}">Add New Category</a>
            </button>
        </div>

        <div class="category-table-container">
            <table class="category-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">
                        <img src="{{ asset('img/admin/image.svg') }}" alt="">
                    </th>

                    <th>Product Name</th>
                    <th>Author Name</th>
                    <th>Added-Date</th>
                    <th style="border-radius: 0px 10px 10px 0px;" colspan="2">Action</th>


                </tr>

{{-- @dd($productlist) --}}
                @foreach ($categorylist as $category)
             
                        <tr>
                            {{-- <td>{{ $product->image }}</td> --}}

                            <td><img src="{{ asset('img/category/'.$category->img) }}" alt="" width="50px"></td>
                            {{-- @dd($image) --}}
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->author_name }}</td>
                            <td>{{ $category->created_at }}</td>

                            <td>
                                {{-- @dump($product) --}}
                                <a href="{{ url('/admin/category/edit/'.$category->id) }}">
                                    <img src="{{ asset('img/admin/edit.svg') }}" alt="" width="20px">
                                </a>
                                <a href="{{ url('/admin/category/delete/'.$category->id) }}">
                                    <img src="{{ asset('img/admin/trashbin.svg') }}" alt="" width="20px">
                                </a>
                            </td>
                        </tr>
           
                @endforeach

            </table>
        </div>

    </div>
@endsection
