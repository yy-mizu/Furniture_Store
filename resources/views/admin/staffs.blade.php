@extends('layouts.adminLayout')


@section('admin-body')
    <div class="staff-page">

        <div class="staff-page-title">
            <h4>Staff List</h4>

            <button style="  border-radius: 0px 10px 10px 10px;">
                <a href="{{route('admin.staff.create')}}">Add New Staff</a>
            </button>
        </div>

        <div class="staff-table-container">
            <table class="staff-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">Staff ID</th>
                    <th></th>
                    <th>Staff Name</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Role</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th style="border-radius: 0px 10px 10px 0px;" colspan="2">Action</th>


                </tr>


                @foreach ($stafflist as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td><img src="{{ asset('img/staff/' . $staff->image) }}" alt="" width="200"></td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->address }}</td>
                        <td>{{ $staff->age }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td>{{ $staff->rolename }}</td>
                        <td>{{ $staff->status }}</td>

                        <td><a href="{{ url('/admin/stafflist/update/' . $staff->id) }}">
                            <img src="{{asset('img/admin/edit.svg')}}" alt="">
                        </a></td>
                        <td><a href="{{ url('/admin/stafflist/update/' . $staff->id) }}">
                            <img src="{{asset('img/admin/trashbin.svg')}}" alt="">
                        </a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection

@section('admin-body-navbar-title')
    STAFF MANAGEMENT
@endsection
