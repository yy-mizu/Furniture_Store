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
                            @if ($updateStatus == true)
                                <img src="{{ asset('img/products/' . $imagelist[0]->img) }}" alt="">
                            @else
                                <input type="file" name="image[]" multiple>
                            @endif
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

                    <div class="input-field-container">
                        <div class="input-field">
                            <label for="name">Name:</label>
                            <input type="text" style="width: 100% " name="name"
                                value="{{ $updateStatus == true ? $productlist->name : old('name') }}">
                        </div>


                        <div class="input-field">
                            <label for="code">Product Code </label>
                            <select name="code" id="code">

                                <option value="codeid">Select Code</option>


                                @foreach ($codelist as $code)
                                    <option value="{{ $code->id }}"
                                        @isset($productlist) {{ $productlist->code_id === $code->id ? 'selected' : '' }} @endisset>
                                        {{ $code->name }}</option>
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
                                <label for="code">Price:</label>
                                <input type="text" style="width: 100% " name="price" value="{{ $updateStatus == true ? $productlist->price : old('price') }}">
                            </div>

                            <div class="input-field">
                                <label for="stock">Total Stocks:</label>
                                <input type="text" style="width: 100% " name="stock" value="{{ $updateStatus == true ? $productlist->stock : old('stock') }}">
                            </div>

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
                </div>

                <div class="btn-field">
                    <button type="submit">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection



{{-- 
  <script>
    const dropBox = document.getElementById('dropBox');
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');
    const dropLabel = document.getElementById('dropLabel');

    dropBox.addEventListener('dragover', (e) => {
      e.preventDefault();
    //   dropBox.style.backgroundColor = '#e2e2e2';
    });

    dropBox.addEventListener('dragleave', () => {
    //   dropBox.style.backgroundColor = '#fff';
    });

    dropBox.addEventListener('drop', (e) => {
      e.preventDefault();
    //   dropBox.style.backgroundColor = '#fff';
      dropLabel.style.display = 'none';
      const files = e.dataTransfer.files;
      handleFiles(files);
    });

    fileInput.addEventListener('change', () => {
      dropLabel.style.display = 'none';
      const files = fileInput.files;
      handleFiles(files);
    });

    function handleFiles(files) {
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = () => {
            const img = new Image();
            img.src = reader.result;
            img.classList.add('preview-img');
            const removeBtn = document.createElement('button');
            removeBtn.textContent = 'X';
            removeBtn.className = 'remove-btn';
            removeBtn.addEventListener('click', () => {
              preview.removeChild(img);
              preview.removeChild(removeBtn);
            });
            preview.appendChild(img);
            preview.appendChild(removeBtn);
          };
          reader.readAsDataURL(file);
        } else {
          alert('Please choose only image files.');
        }
      }
    }
  </script> --}}
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Drop Box</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
  }

  .drop-box {
    width: 300px;
    height: 200px;
    border: 2px dashed #ccc;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    overflow: hidden;
    position: relative;
  }

  .drop-box input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
  }

  .drop-box label {
    font-size: 16px;
    color: #555;
    z-index: 1;
  }

  .preview {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-wrap: wrap;
    max-width: calc(100% - 20px);
    max-height: calc(100% - 20px);
    overflow: auto;
    padding: 10px;
    position: absolute;
    top: 0;
    left: 0;
  }

  .preview img {
    max-width: 100px;
    max-height: 100px;
    margin: 5px;
    position: relative;
  }

  .preview .remove-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 18px;
    text-align: center;
    cursor: pointer;
    display: none;
  }

  .preview img:hover + .remove-btn {
    display: block;
  }
</style>
</head>
<body>
  <div class="drop-box" id="dropBox">
    <input type="file" id="fileInput" accept="image/*" multiple>
    <label for="fileInput" id="dropLabel">Drop images here or click to upload</label>
    <div class="preview" id="preview"></div>
  </div>

  <script>
    const dropBox = document.getElementById('dropBox');
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');
    const dropLabel = document.getElementById('dropLabel');

    dropBox.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropBox.style.backgroundColor = '#e2e2e2';
    });

    dropBox.addEventListener('dragleave', () => {
      dropBox.style.backgroundColor = '#fff';
    });

    dropBox.addEventListener('drop', (e) => {
      e.preventDefault();
      dropBox.style.backgroundColor = '#fff';
      dropLabel.style.display = 'none';
      const files = e.dataTransfer.files;
      handleFiles(files);
    });

    fileInput.addEventListener('change', () => {
      dropLabel.style.display = 'none';
      const files = fileInput.files;
      handleFiles(files);
    });

    function handleFiles(files) {
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = () => {
            const img = new Image();
            img.src = reader.result;
            img.classList.add('preview-img');
            const removeBtn = document.createElement('button');
            removeBtn.textContent = 'X';
            removeBtn.className = 'remove-btn';
            removeBtn.addEventListener('click', () => {
              preview.removeChild(img);
              preview.removeChild(removeBtn);
            });
            preview.appendChild(img);
            preview.appendChild(removeBtn);
          };
          reader.readAsDataURL(file);
        } else {
          alert('Please choose only image files.');
        }
      }
    }
  </script>
</body>
</html> --}}
