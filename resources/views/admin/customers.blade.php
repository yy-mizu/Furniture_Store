@extends('layouts.adminLayout')


@section('admin-body')
    <div class="customer-page">

        <div class="customer-page-title">
            <h4>Staff List</h4>


        </div>

        <div class="customer-table-container">
            <table class="customer-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">Staff ID</th>
                    <th>Image</th>
                    <th>Staff Name</th>
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
                        <td>{{ $staff->address }}</td>
                        <td>{{ $customer->age }}</td>

                        <td>{{ $customer->status }}</td>

                        <td><a href="{{ url('/admin/customerlist/update/' . $customer->id) }}">Edit</a></td>
                        <td><a href="">Delete</a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

@section('admin-body-navbar-title')
    Customer Management
@endsection