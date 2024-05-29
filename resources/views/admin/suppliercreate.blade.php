@extends('layouts.adminLayout')

@php
    $updateStatus = false;
    if (isset($supplier_data)) {
        $updateStatus = true;
    }
@endphp
@section('title', 'Dashboard | Add Supplier')


@section('admin-body-navbar-title', 'Add Supplier User')

@section('admin-body')
    <section class="add-supplier-wrapper">
        <div class="add-supplier-container">
            <form
                action="{{ $updateStatus == true ? route('admin.supplier.edit.process') : route('admin.supplier.create.process') }}"
                method = 'POST' class="add-supplier-form" enctype="multipart/form-data">
                @csrf

                @if ($updateStatus == true)
                    @method('PATCH')
                @endif
                <input type="hidden" name="id" value='{{ $updateStatus == true ? $supplier_data->id : '' }}'>
                <div class="add-supplier-form row one">

                    <div class="input-field">
                        @if ($updateStatus == true)
                            <img src="{{ asset('img/supplier/' . $supplier_data->img) }}" alt="" width="150px">
                        @else
                            <label for="img">Choose Image For Supplier</label>
                            <input type="file" name="img" multiple required>
                        @endif
                        {{-- <label for="fileInput">Choose Image</label> --}}
                    </div>

                    <div class="input-field">
                        <label for="name">Name:</label>
                        <input type="text" style="width: 100% " name="name"
                            value="{{ $updateStatus == true ? $supplier_data->name : '' }}" required>
                    </div>
                    {{-- <div class="staffimg-preview" id="preview"></div> --}}
                </div>




        

        <div class="add-supplier-form row two">
            <div class="input-field">
                <label for="address">Address:</label>
                <textarea type="text" style="width: 100% " name="address" required>{{ $updateStatus == true ? $supplier_data->address : '' }}</textarea>
            </div>
        </div>

        <div class="add-supplier-form row three">
            <div class="input-field">
                <label for="phone">Phone:</label>
                <input type="text" style="width: 100% " name="phone"
                    value="{{ $updateStatus == true ? $supplier_data->phone : '' }}" required>
            </div>

            <div class="input-field">
                <label for="email">Email:</label>
                <input type="email" name="email" style="width: 100% "
                    value="{{ $updateStatus == true ? $supplier_data->email : '' }}" required>
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
