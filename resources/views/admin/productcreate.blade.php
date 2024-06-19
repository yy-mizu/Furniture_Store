@extends('layouts.adminLayout')
@php
    $updateStatus = false;
    if (isset($productlist)) {
        $updateStatus = true;
    }
@endphp
{{-- @dd($imagelist[0]->img) --}}
@section('admin-body-navbar-title')
    {{ $updateStatus == true ? 'Update Category' : 'Add Category' }}
@endsection
@section('admin-body')
    <div class="add-product-wrapper">
        <div class="add-product-container">

            <form
                action="{{ $updateStatus == true ? route('admin.product.edit.process') : route('admin.product.create.process') }}"
                method="POST" class="add-product-form" enctype="multipart/form-data">
                @csrf

                @if ($updateStatus == true)
                    @method('PATCH')
                @endif

                <input type="hidden" name="id" value='{{ $updateStatus == true ? $productlist->id : '' }}'>

                <div class="add-product-form row one">
                    {{-- <div class="drop-box-container">
                        <div class="drop-box" id="dropBox">
                            <input type="file" id="fileInput" accept="image/*" name="image" multiple>
                            <label for="fileInput" id="dropLabel">Drop images here or click to upload</label>
                            <div class="preview" id="preview"></div>
                        </div>
                       
                    </div> --}}
                    <div class="input-field-container">
                        <div class="input-field">
                            <label for="image">Choose Image for product</label>
                            @if ($updateStatus == true && isset($imagelist[0]->img))
                                <img src="{{ asset('img/products/' . $imagelist[0]->img) }}" alt="" style="height: 300px; width:250px">
                            @else
                                <input type="file" name="image[]" multiple>
                           
                            @endif
                        </div>

                        {{-- <form action="/upload" class="dropzone" id="image-upload">
                            @csrf
                          </form> --}}

                       


                    </div>

                    <div class="input-field-container">
                        <div class="input-field">
                            <label for="name">Name:</label>
                            <input type="text" style="width: 100% " name="name"
                                value="{{ $updateStatus == true ? $productlist->name : old('name') }}">
                        </div>

                        <div class="input-field">
                          <label for="supplier">Choose Supplier</label>
                          <select name="supplier" id="supplier">
                             
                              <option value="supplierid" >Select Supplier</option>
             
                                 
                                 @foreach ($supplierlist as $supplier)
                                 <option value="{{$supplier->id}}" @isset($productlist) {{$productlist->supplier_id === $supplier->id? "selected" : ''}} @endisset>{{$supplier->name}}</option>
                              @endforeach
                          </select>
                      </div>


                    
                    </div>
                </div>

                <div class="add-product-form row two">
                    <div class="input-field" ">
                                <label for="Description">Description:</label>
                                <textarea type="text"
                                    style="width: 95%;
                                                    border: 1px solid gray;
                                                    text-decoration: none;
                                                    border-radius: 10px;
                                                    background-color: rgb(46,46,72); 
                                                    margin-top: 0.5rem;"
                                    name="description" rows="4" value="">{{ $updateStatus == true ? $productlist->description : old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="add-product-form row three">

                          <div class="input-field">
                            <label for="category">Select Category</label>
                            <select name="category" id="category" value="{{ $updateStatus == true ? $productlist->category : old('category') }}">
                                <option value="categoryid" selected>Select Categories</option>
                                  @foreach ($categorylist as $category)
                    <option value="{{ $category['id'] }}"
                        @isset($productlist){{ $productlist->category_id === $category->id ? 'selected' : '' }} @endisset>
                        {{ $category['name'] }}</option>
                    @endforeach
                    </select>
                </div>
                            <div class="input-field">
                                <label for="code">Price:</label>
                                <input type="text" style="width: 100% " name="price" value="{{ $updateStatus == true ? $productlist->price : old('price') }}">
                            </div>

                            <div class="input-field">
                                <label for="stock">Total Stocks:</label>
                                <input type="text" style="width: 100% " name="stock" value="{{ $updateStatus == true ? $productlist->stock : old('stock') }}">
                            </div>

                         
                </div>

                <div class="btn-field">
                    <button type="submit">
                        Submit
                    </button>

                    <button style="background-color: orange">
                      <a href="{{route('admin.productlist')}}">
                        Cancel
                      </a>
                  </button>
                </div>

            </form>
        </div>
    </div>
@endsection


</body>

</html>
