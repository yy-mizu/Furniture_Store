@extends('layouts.customerLayout')
@section('title', 'shop || furniture')
@section('content')
    {{-- @dd($filtered_products[0]->category->name) --}}
    <section class="shop-slider">
        <div class="slide-container">
            <div class="slider-wrapper">

                <ul class="image-list">
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(1).png') }}" alt="img-1" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(2).png') }}" alt="img-2" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(3).png') }}" alt="img-3" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(4).png') }}" alt="img-4" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(1).png') }}" alt="img-5" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(2).png') }}" alt="img-6" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(3).png') }}" alt="img-7" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(4).png') }}" alt="img-8" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(1).png') }}" alt="img-9" />
                    <img class="image-item" src="{{ asset('/img/customer/IMAGE(2).png') }}" alt="img-10" />
                </ul>

            </div>

        </div>
    </section>
    <section class="shop">
        <div class="link-connect">
            <span><a href="{{ route('customer.home') }}">Home</a></span>
            <span>Shop</span>
        </div>
        <div class="title">SHOP</div>
        <div class="shop-nav">
            {{-- <a href="#">View 16 per page</a> --}}

            <div class="search">
                <form action="{{route('customer.shop.search')}}" class="search-form" method="POST">
                   
                        @csrf
                        <input type="text" name="search" placeholder="Search Anything">
                        <button type="submit">Search</button>
                   
                </form>
            </div>
            <div class="filter">
                {{-- <div class="category-dropdown">
                    @if (isset($filtered_products))
                    <a href="#">{{$filtered_products[0]->category->name}}
                        <img src="{{ asset('/img/customer/previous-svgrepo-com 11.svg') }}" alt="">
                    </a>
                    @else
                    <a href="#">CATEGORIES
                        <img src="{{ asset('/img/customer/previous-svgrepo-com 11.svg') }}" alt="">
                    </a>
                    @endif
                   

                    <div class="category-content">

                        @foreach ($categories as $category)
                            <a href="{{ url('/customer/filter/' . $category->id) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="#">PRICE
                    <img src="{{ asset('/img/customer/previous-svgrepo-com 11.svg') }}" alt="">
                </a>

                <a href="#" class="selected">SORT BY LATEST
                    <img src="{{ asset('/img/customer/previous-svgrepo-com 11.svg') }}" alt="">
                </a> --}}

                <form action="{{route('customer.shop.filter')}}" class="filter-form">
                    <div class="filter-field">
                        <select name="category" id="">
                            <option value="" selected>Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{Request::get('category') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-field">
                        <select name="price" id="">
                                <option value="" selected>Price</option>
                                <option value="below500" {{Request::get('price') == "below500" ? 'selected' : ''}}>$500 and BELOW</option>
                                <option value="500to1000"{{Request::get('price') == "500to1000" ? 'selected' : ''}}>$500 to $1000</option>
                                <option value="above1000"{{Request::get('price') == "above1000" ? 'selected' : ''}}>$1000 and ABOVE</option>  
                        </select>
                    </div>

                    <div class="filter-field">
                        <select name="sort" id="">
                            
                                <option value="latest">LATEST FIRST</option>
                                <option value="oldest">OLDEST FIRST</option>
                               
                        </select>
                    </div>

                    <button>Filter</button>
                </form>
            </div>
        </div>
        <div class="shop-card-container">

            {{-- @foreach ($products as $product)
                @foreach ($product->photos as $photo)
                    <a class="card-link" href="{{ url('/detail/' . $product->id) }}"
                        style="text-decoration: none;
            color:black">
                        <div class="shop-card">
                            <div class="shop-card-image">
                                <img src="{{ asset('/img/products/' . $photo->img) }}" alt="">
                                <span class="upperSpan hot">Hot</span>
                            </div>
                            <div class="shop-card-content">
                                <p>{{ $product->name }}</p>
                                <p>${{ $product->price }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endforeach --}}

            @if (isset($filtered_products))
                @foreach ($filtered_products as $product)
                    @foreach ($product->photos as $photo)
                        <a class="card-link" href="{{ url('/detail/' . $product->id) }}"
                            style="text-decoration: none;
            color:black">
                            <div class="shop-card">
                                <div class="shop-card-image">
                                    <img src="{{ asset('/img/products/' . $photo->img) }}" alt="">
                                    <span class="upperSpan hot">Hot</span>
                                </div>
                                <div class="shop-card-content">
                                    <p>{{ $product->name }}</p>
                                    <p>${{ $product->price }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endforeach
            @else
                @foreach ($products as $product)
                    @foreach ($product->photos as $photo)
                        <a class="card-link" href="{{ url('/detail/' . $product->id) }}"
                            style="text-decoration: none;
        color:black">
                            <div class="shop-card">
                                <div class="shop-card-image">
                                    <img src="{{ asset('/img/products/' . $photo->img) }}" alt="">
                                    <span class="upperSpan hot">Hot</span>
                                </div>
                                <div class="shop-card-content">
                                    <p>{{ $product->name }}</p>
                                    <p>${{ $product->price }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endforeach
            @endif

        </div>

        <div class="pagination">
            @if (isset($filtered_products))
                {{ $filtered_products->links() }}
            @else
                {{ $products->links() }}
            @endif
        </div>

        {{-- <div class="loadMore">
          <p>You're viewed 16 of 50 products</p>
            <a href="#">LOAD MORE</a>
        </div> --}}
    </section>
@endsection
