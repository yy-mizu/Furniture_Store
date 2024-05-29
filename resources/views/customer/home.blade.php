@extends('layouts.customerLayout')

{{-- @dd($grid_items[1]['products_count']) --}}
{{-- @dd($bedlist) --}}
@section('title', 'Home')

@section('content')
    <!-- Slideshow container -->
    <div class="slideshow-container">
        <div class="text">
            <h3>SALE OFF 30%</h3>
            <h1>Classic 2023 Interior Designs</h1>
            <p>orem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <button>Shop Now <img src="{{asset('img/customer/right-arrow-svgrepo-com 2.svg')}}" alt=""></button>
        </div>
        <!-- Full-width images with number and caption text -->
        <div class="mySlides ">
    
            <img src="{{asset('img/customer/homeSlider.png')}}" alt="">
    
        </div>
    
        <div class="mySlides fade">
    
            <img src="{{asset('img/customer/blog1.png')}}">
    
        </div>
    
        <div class="mySlides fade">
    
            <img src="{{asset('img/customer/blog2.png')}}">
    
        </div>
    
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>


    <section class="home-grid">
        {{-- @foreach($grid_items as $item) --}}
    @if(isset($grid_items))
        <div class="bed home-gird-card">
            <div class="home-grid-text">
                <b>{{$grid_items[0]['name']}}</b>
                <p>{{$grid_items[0]['products_count']}}</p>
            </div>
           
            <img src="img/customer/homeGrid1.png" alt="">
        </div>
        <div class="sofa home-gird-card">
            <div class="home-grid-text">
                <b>{{$grid_items[1]['name']}}</b>
                <p>{{$grid_items[1]['products_count']}}</p>
            </div>
            <img src="img/customer/homeGrid2.png" alt="">
        </div>
        <div class="lamp home-gird-card">
            <div class="home-grid-text">
                <b>{{$grid_items[2]['name']}}</b>
                <p>{{$grid_items[2]['products_count']}}</p>
            </div>
             <img src="img/customer/homeGrid3.png" alt="">
        </div>
        <div class="cabinet home-gird-card">
            <div class="home-grid-text">
                <b>{{$grid_items[3]['name']}}</b>
                <p>{{$grid_items[3]['products_count']}}</p>
            </div>

            
            <img src="img/customer/homeGrid4.png" alt="">
        </div>
        <div class="table home-gird-card">
            <div class="home-grid-text">
                <b>{{$grid_items[4]['name']}}</b>
                <p>{{$grid_items[4]['products_count']}}</p>
            </div>
            
            <img src="img/customer/homeGrid5.png" alt="">
        </div>

        @endif
        {{-- @endforeach --}}
        <a>
            Explore more
            <img src="img/customer/icons.svg" alt="">
        </a>
    </section>
    <section class="new-products">
        <h2 class="heading">NEW PRODUCTS</h2>
        <div class="product-nav">
            <button class="navbar-title" onclick="openMenu('bed')" data-category="bed">Bed</button>
            <button class="" onclick="openMenu('sofa')" data-category="sofa"><a class="navbar-title">Sofa</a></button>
            <button class="" onclick="openMenu('lamp')" ><a  class="navbar-title">Lamp</a></button>
            <button class="" onclick="openMenu('cabinet')"><a  class="navbar-title">Cabinet</a></button>
            <button class="" onclick="openMenu('table')"><a  class="navbar-title">Table</a></button>
            
        </div>
        <div id="bed" class="menu">
            <div class="product-card-container">

                @foreach ($bedlist as $bed)
                    
                <a class="card-link" href="{{url('/detail/'.$bed->id)}}">
                <div class="product-card">
                    <div class="product-card-image">
                        <img src="{{asset('img/products/'.$bed->img)}}" alt="">
                        <span class="sale">Sale</span>
                    </div>
                    <div class="product-card-content">
                        <p>{{$bed->name}}</p>
                        <p>${{$bed->price}}</p>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
        <div id="sofa" class="menu" style="display:none">
            <div class="product-card-container">

                @foreach ($sofalist as $sofa)
                    
                    {{-- @include('customer.product-card') --}}
                    <a class="card-link" href="{{url('/detail/'.$sofa->id)}}">
                <div class="product-card">
                    <div class="product-card-image">
                        <img src="{{asset('img/products/'.$sofa->img)}}" alt="">
                        <span class="sale">Sale</span>
                    </div>
                    <div class="product-card-content">
                        <p>{{$sofa->name}}</p>
                        <p>${{$sofa->price}}</p>
                    </div>
                </div>
                    </a>
                @endforeach
            </div>
            
        </div>
        <div id="lamp" class=" menu" style="display:none">
            <div class="product-card-container">

                @foreach ($lamplist as $lamp)
                    
                    {{-- @include('customer.product-card') --}}
                    <a class="card-link" href="{{url('/detail/'.$lamp->id)}}">
                <div class="product-card">
                    <div class="product-card-image">
                        <img src="{{asset('img/products/'.$lamp->img)}}" alt="">
                        <span class="sale">Sale</span>
                    </div>
                    <div class="product-card-content">
                        <p>{{$lamp->name}}</p>
                        <p>${{$lamp->price}}</p>
                    </div>
                </div>
            
                @endforeach
            </div>
            
        </div>
        <div id="cabinet" class="menu" style="display:none">
            <div class="product-card-container">

                @foreach ($cablist as $cab)
                    
                    {{-- @include('customer.product-card') --}}
                    <a class="card-link" href="{{url('/detail/'.$cab->id)}}">
                <div class="product-card">
                    <div class="product-card-image">
                        <img src="{{asset('img/products/'.$cab->img)}}" alt="">
                        <span class="sale">Sale</span>
                    </div>
                    <div class="product-card-content">
                        <p>{{$cab->name}}</p>
                        <p>${{$cab->price}}</p>
                    </div>
                </div>
            
                @endforeach
            </div>
            
          
        </div>
        <div id="table" class=" menu" style="display:none">
            <div class="product-card-container">

                @foreach ($tablelist as $table)
                    
                    {{-- @include('customer.product-card') --}}
                    <a class="card-link" href="{{url('/detail/'.$table->id)}}">
                <div class="product-card">
                    <div class="product-card-image">
                        <img src="{{asset('img/products/'.$table->img)}}" alt="">
                        <span class="sale">Sale</span>
                    </div>
                    <div class="product-card-content">
                        <p>{{$table->name}}</p>
                        <p>${{$table->price}}</p>
                    </div>
                </div>
            
                @endforeach
            </div>
            
            
        </div>


      
    </section>
    <section class="home-banner">
        <div class="banner">
            <div class="banner-content">
                <h2>Up To 60% Off</h2>
                <div class="ellipse">
                    
                        <div class="e-img">
                            <div class="timer">
                                <p>3</p>
                                <p>Days</p>
                            </div>
                            <img src="img/customer/Ellipse 9.svg" alt="">
                        </div>
                    <div class="e-img">
                        <div class="timer">
                            <p>5</p>
                            <p>Hours</p>
                        </div>
                        <img src="img/customer/Ellipse 9.svg" alt="">
                    </div>
                    <div class="e-img">
                        <div class="timer">
                            <p>30</p>
                            <p>Mins</p>
                        </div>
                        <img src="img/customer/Ellipse 9.svg" alt="">
                    </div>
                    <div class="e-img">
                        <div class="timer">
                            <p>30</p>
                            <p>Secs</p>
                        </div>
                        <img src="img/customer/Ellipse 9.svg" alt="">
                    </div>
                        
                    
                   
                </div>
            </div>
            <div class="banner-image">
                <img src="img/customer/homeSofaBanner.png" alt="">
            </div>
        </div>
    </section>
    <section class="blog">
        <h2 class="heading">LATEST BLOG</h2>
        <div class="blog-card-container">
            <div class="blog-card">
                <img src="img/customer/blog1.png" alt="">
                <div class="blog-text">
                    <p>Nov 7,2023</p>
                    <b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                    book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                    unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                    recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <p></p>
            </div>
            <div class="blog-card">
                <img src="img/customer/blog2.png" alt="">
                <div class="blog-text">
                    <p>Nov 7,2023</p>
                    <b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard
                        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                        type specimen
                        book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                        essentially
                        unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more
                        recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <p></p>
            </div>
        </div>
    </section>

@endsection