@extends('layouts.adminLayout')

@section('title', 'Dashboard | Add Category')


@section('admin-body-navbar-title', 'Add Category')

@section('admin-body')

@php
$updateStatus = false;
if (isset($category_data)) {
    $updateStatus = true;
}
@endphp
    <section class="add-category-wrapper">
        <div class="add-category-container">
            <form action="{{ $updateStatus == true ? route('admin.category.edit.process') : route('admin.category.create.process') }}" method = 'POST' class="add-category-form"
             enctype="multipart/form-data">
                @csrf

                @if ($updateStatus == true)
                @method('PATCH')
            @endif
            <input type="hidden" name="id" value='{{ $updateStatus == true ? $category_data->id : '' }}'>
                <div class="row one">
                    <div class="input-field">
                        <label for="name">Name:</label>
                        <input type="text" style="width: 100% " name="name" value='{{ $updateStatus == true ? $category_data->name : '' }}''>
                        @if (session('error'))
                        <small style="color: red;
                                     margin-bottom: 1rem"
                                     >{{ session('error') }} </small> 
                     @endif
                       
                        @if($updateStatus == true) 
                        
                        <img src="{{asset('img/category/'.$category_data->img)}}" alt="" style="margin-top: 1rem" >
                        @else
                        <label for="img">Choose an Image</label>
                          <input type="file" name="img">
                        @endif

                    </div>

                   
                </div>

                <div class="row two">
                    <div class="input-field">
                        <label for="name">Description:</label>
                        <textarea type="text" style="width: 100% " name="description">{{ $updateStatus == true ? $category_data->description : '' }}</textarea>
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

