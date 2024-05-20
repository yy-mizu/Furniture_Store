@extends('layouts.customerLayout')
@section('title','category || furniture')
@section('content')
    <section class="category">
        <div class="link-connect">
            <span>Home</span>
            <span>Shop</span>
            <span>Bed</span>
        </div>
        <div class="title">BED</div>
        <div class="shop-nav">
            <div class="left-nav">
                <a href="#">View 16 per page</a>
                <a href="#">Zoom in</a>

            </div>
            
            <div class="filter">
                <a href="#">CATEGORIES
                    <img src="{{asset('/image/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#">PRICE
                    <img src="{{asset('/image/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#">COLOR
                    <img src="{{asset('/image/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#">MATERIAL
                    <img src="{{asset('/image/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#" class="selected">SORT BY LATEST
                    <img src="{{asset('/image/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
            </div>
        </div>
        <div class="shop-card-container">
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category1.png')}}" alt="">
                   
                </div>
                <div class="shop-card-content">
                    <p>Modway Olivia Bed</p>
                    <p>$1,200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category2.png')}}" alt="">
        
                </div>
                <div class="shop-card-content">
                    <p>Gwyneth Velvet King Bed</p>
                    <p>$1,200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category3.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Upholstered Bed</p>
                    <p>$1,200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category4.png')}}" alt="">
                    
                </div>
                <div class="shop-card-content">
                    <p>Montana King Bed</p>
                    <p>$1,000.00 - $1,500.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category5.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Jervis Single Bed</p>
                    <p>$1,100.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category6.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Storage Bed Frame</p>
                    <p>$1,200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category7.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Chaise Corner Sofa Bed</p>
                    <p>$1,500.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/image/customer/category8.png')}}" alt="">
        
                </div>
                <div class="shop-card-content">
                    <p>Fabric Sofa Bed</p>
                    <p><span class="mute-text">$1,200.00</span>$1,000.00</p>
                </div>
            </div>
        
        
        </div>
    </section>
@endsection