@extends('layouts.adminLayout')

@php
    $updateStatus = false;
    if (isset($staff_data)) {
        $updateStatus = true;
    }
@endphp
@section('title', 'Dashboard | Add Staff')


@section('admin-body-navbar-title', 'Add Staff User')

@section('admin-body')
    <section class="add-staff-wrapper">
        <div class="add-staff-container">
            <form
                action="{{ $updateStatus == true ? route('admin.staff.edit.process') : route('admin.staff.create.process') }}"
                method = 'POST' class="add-staff-form" enctype="multipart/form-data">
                @csrf

                @if ($updateStatus == true)
                    @method('PATCH')
                @endif
                <input type="hidden" name="id" value='{{ $updateStatus == true ? $staff_data->id : '' }}'>
                <div class="row one">
                    <div class="input-field">
                        <label for="name">Name:</label>
                        <input type="text" style="width: 100% " name="name"
                            value="{{ $updateStatus == true ? $staff_data->name : '' }}">
                    </div>

                    <div class="input-field">
                        <label for="age">Age:</label>
                        <input type="number" name="age" style="width: 100% "
                            value="{{ $updateStatus == true ? $staff_data->age : '' }}">
                    </div>
                </div>

                <div class="row two">
                    <div class="input-field">
                        <label for="address">Address:</label>
                        <input type="text" style="width: 100% " name="address"
                            value="{{ $updateStatus == true ? $staff_data->address : '' }}">
                    </div>
                </div>

                <div class="row three">
                    <div class="input-field">
                        <label for="phone">Phone:</label>
                        <input type="text" style="width: 100% " name="phone"
                            value="{{ $updateStatus == true ? $staff_data->phone : '' }}">
                    </div>

                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input type="email" name="email" style="width: 100% "
                            value="{{ $updateStatus == true ? $staff_data->email : '' }}">
                    </div>
                </div>

                <div class="row four">
                    <div class="input-field">
                        <div class="staffimg-drop-box" id="dropBox">
                            @if($updateStatus == true) 
                            
                            
                            <img src="{{asset('img/staff/'.$staff_data->image)}}" alt="" 
                            width="150px">
                            @else
                              
                              <input type="file" name="img" multiple>
                            @endif
                            {{-- <label for="fileInput">Choose Image</label> --}}
                        </div>
                        {{-- <div class="staffimg-preview" id="preview"></div> --}}
                    </div>

                    <div class="input-field-container"
                        style="display: flex;
                                                    flex-direction: column;
                                                    gap:2rem;
                                                    padding: 10px;
                                                    ">
                        <div class="input-field">
                            <label for="role">Select Role</label>
                            <select name="role" id="role">
                                <option value="roleid" selected>Select Roles</option>
                                @foreach ($rolelist as $role)
                                   <option value="{{$role->id}}" @isset($staff_data) {{$staff_data->role_id === $role->id? "selected" : ''}} @endisset>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @if($updateStatus == true)
                        <div></div>

                        @else
                        <div class="input-field">
                            <label for="password">Password:</label>
                            <input type="password" style="width: 100% " name="password"
                            value="{{$updateStatus == true ? $staff_data->password : '' }}">
                        </div>
                        @endif
                    </div>
                </div>

                <div class="btn-field">
                    <button>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection




</body>

</html>
