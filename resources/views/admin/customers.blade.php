@extends('layouts.adminLayout')


@section('admin-body')
    <div class="customer-page">

        <div class="customer-page-title">
            <h4>Staff List</h4>


        </div>

        <div class="customer-table-container">
            <table class="customer-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">ID</th>
                    <th>Image</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th style="border-radius: 0px 10px 10px 0px;" colspan="2">Action</th>


                </tr>


                @foreach ($customerlist as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td><img src="{{ asset('img/staff/' . $customer->image) }}" alt="" width="200"></td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->status }}</td>

                        <td><a href="{{ url('/admin/customer/delete/' . $customer->id) }}">
                            <img src="{{asset('img/admin/trashbin.svg')}}" alt="">
                        </a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

@section('admin-body-navbar-title')
    Customer Management
@endsection
