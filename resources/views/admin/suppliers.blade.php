@extends('layouts.adminLayout')

{{-- @dd($stafflist) --}}
@section('admin-body')
    <div class="supplier-page">

        <div class="supplier-page-title">
            <h4>Supplier List</h4>

            <button style="  border-radius: 0px 10px 10px 10px;">
                <a href="{{route('admin.supplier.create')}}">Add New Supplier</a>
            </button>
        </div>

        <div class="supplier-table-container">
            <table class="supplier-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">Supplier ID</th>
                    <th >
                        <img src="{{ asset('img/admin/image.svg') }}" alt="">
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th style="border-radius: 0px 10px 10px 0px;" colspan="2">Action</th>


                </tr>


                @foreach ($supplierlist as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td><img src="{{ asset('img/supplier/' . $supplier->img) }}" alt="" width="80"></td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->address }}</td>
                      
                        <td>{{ $supplier->phone }}</td>
            
                        <td>{{ $supplier->status }}</td>

                        <td><a href="{{ url('/admin/supplier/edit/' . $supplier->id) }}">
                            <img src="{{asset('img/admin/edit.svg')}}" alt="">
                        </a></td>
                        <td><a href="{{ url('/admin/supplier/delete/' . $supplier->id) }}">
                            <img src="{{asset('img/admin/trashbin.svg')}}" alt="">
                        </a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

@section('admin-body-navbar-title')
SUPPLIER MANAGEMENT
@endsection
