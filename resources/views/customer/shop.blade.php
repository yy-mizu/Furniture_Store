@extends('layouts.customerLayout')
@section('title','shop || furniture')
@section('content')

    <section class="shop-slider">
        <div class="container">
            <div class="slider-wrapper">
                <button id="prev-slide" class="slide-button ">
                    <img src="{{asset('/img/customer/previous-svgrepo-com 1.svg')}}" alt="">
                </button>
                <ul class="image-list">
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(1).png')}}" alt="img-1" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(2).png')}}" alt="img-2" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(3).png')}}" alt="img-3" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(4).png')}}" alt="img-4" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(1).png')}}" alt="img-5" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(2).png')}}" alt="img-6" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(3).png')}}" alt="img-7" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(4).png')}}" alt="img-8" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(1).png')}}" alt="img-9" />
                    <img class="image-item" src="{{asset('/img/customer/IMAGE(2).png')}}" alt="img-10" />
                </ul>
                <button id="next-slide" class="slide-button">
                    <img src="{{asset('/img/customer/previous-svgrepo-com 1(1).svg')}}" alt="">
                </button>
            </div>
        
        </div>
    </section>
    <section class="shop">
        <div class="link-connect">
            <span>Home</span>
            <span>Shop</span>
        </div>
        <div class="title">SHOP</div>
        <div class="shop-nav">
            <a href="#">View 16 per page</a>
            <div class="filter">
                <a href="#">CATEGORIES
                    <img src="{{asset('/img/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#">PRICE
                    <img src="{{asset('/img/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#">COLOR
                    <img src="{{asset('/img/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#">MATERIAL
                    <img src="{{asset('/img/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
                <a href="#" class="selected">SORT BY LATEST
                    <img src="{{asset('/img/customer/previous-svgrepo-com 11.svg')}}" alt="">
                </a>
            </div>
        </div>
        <div class="shop-card-container">
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage1.png')}}" alt="">
                    <span class="upperSpan hot">Hot</span>
                </div>
                <div class="shop-card-content">
                    <p>Globe Electric Tech Series</p>
                    <p>$460.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage2.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage3.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Stacking Storage Box</p>
                    <p>$600.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage4.png')}}" alt="">
                    <span class="upperSpan hot">Hot</span>
                </div>
                <div class="shop-card-content">
                    <p>Stacking Drawer</p>
                    <p>$600.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage5.png')}}" alt="">
                    
                    <span class="upperSpan minus">-31%</span>
                </div>
                <div class="shop-card-content">
                    <p >Cylindo Fabric Sofa</p>
                    <p><span class="mute-text">$1,459.00 </span>$1000.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage6.png')}}" alt="">
                    <span class="upperSpan minus">-17%</span>
                    <span class="lowerSpan hot">Hot</span>
                </div>
                <div class="shop-card-content">
                    <p>Vipp Pendant</p>
                    <p><span class="mute-text">$600.00 </span>$500.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage7.png')}}" alt="">
                    <span class="upperSpan hot">Hot</span>
                </div>
                <div class="shop-card-content">
                    <p>Draht Hocker Sidetable</p>
                    <p>$299.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage8.png')}}" alt="">
                   
                </div>
                <div class="shop-card-content">
                    <p>Vipp Armchair Black Leather</p>
                    <p>$220.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage9.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Modway Olivia Bed</p>
                    <p>$1200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage10.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Gwyneth Velvet King Bed</p>
                    <p>$1200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage11.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Vipp Desk Lamp</p>
                    <p>$500.00 - $600.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage12.png')}}" alt="">
                    
                </div>
                <div class="shop-card-content">
                    <p>Upholstered Bed</p>
                    <p>$1200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage13.png')}}" alt="">
                    <span class="upperSpan hot">Hot</span>
                </div>
                <div class="shop-card-content">
                    <p>Klosh Wall Clock</p>
                    <p>$80.00 - $129.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage14.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Arne Dining Chair</p>
                    <p>$350.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage15.png')}}" alt="">
                    <span class="upperSpan minus">-32%</span>
                </div>
                <div class="shop-card-content">
                    <p>Vasagle Vanity Table</p>
                    <p><span class="mute-text">$1,760.00 </span>$1200.00</p>
                </div>
            </div>
            <div class="shop-card">
                <div class="shop-card-image">
                    <img src="{{asset('/img/customer/shopImage16.png')}}" alt="">
                </div>
                <div class="shop-card-content">
                    <p>Modern Side Table</p>
                    <p>$500.00</p>
                </div>
            </div>
           
        </div> 
        <div class="loadMore">
            <p>You're viewed 16 of 50 products</p>
            <a href="#">LOAD MORE</a>
        </div>
    </section>
@endsection
