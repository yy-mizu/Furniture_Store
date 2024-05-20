<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    <!-- custom css link  -->
    <link rel="stylesheet" href="{{ asset('css/customer/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/customer/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/story.css') }}">
   
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
    <section class="top-nav">
        <div class="left">
            <div><img src="{{asset('img/customer/vector.svg')}}" alt="facebook"></div>
            <div><img src="{{asset('img/customer/instagram 1.svg')}}" alt="instargam"></div>
            <div><img src="{{asset('img/customer/youtube 1.svg')}}" alt="youtube"></div>
            <div><img src="{{asset('img/customer/telegram-original 1.svg')}}" alt="telegram"></div>
        </div>

        
          <div class="right">
            <span>Up to 40% off best selling furnitures.</span>
            <span>Shop Now</span>
        </div>

    </section>
    <section class="nav">
        <div class="nav-left">
            <div class="nav-brand">Logo</div>
            <div class="nav-menu">
                <a href="{{route('customer.home')}}">Home</a>
                <a href="{{route('customer.shop')}}">Shop</a>
                
                <!-- <a href=""> -->
                    <div class="dropdown">
                        <button class="dropbtn">Category
                            <img src="{{asset('img/customer/caret-down-solid.svg')}}" alt="">
                        </button>
                        <div class="dropdown-content">
                            
                            <div class="row">
                                <div class="column">
                                    <h3>CATEGORY ONE </h3>
                                    <div class="column">
                                        <a href="#">Bed</a>
                                        <a href="#">Cabinet</a>
                                        <a href="#">Sofa</a>
                                        <a href="#">Kitchen</a>
                                        <a href="#">Office</a>
                                        <a href="#">Chair</a>
                                    </div>
                                    <div class="column">
                                        <a href="#">Bed</a>
                                        <a href="#">Cabinet</a>
                                        <a href="#">Sofa</a>
                                        <a href="#">Kitchen</a>
                                        <a href="#">Office</a>
                                        <a href="#">Chair</a>
                                    </div>
                                </div>
                                <div class="column">
                                    <img src="{{asset('img/customer/megaMenu1.jpg')}}" alt="" >
                                    <img src="{{asset('img/customer/megaMenu2.jpg')}}" alt="" >
                                </div>
                             
                            </div>
                        </div>
                    </div>
                <!-- </a> -->
                <a href="">Blog</a>
                <a href="">About Us</a>
               
                <a href="">Contact</a>
            </div>
        </div>
        
        <div class="nav-right">
            <div><img src="{{asset('img/customer/Frame.svg')}}" alt="magnifying glass"></div>
            <div><img src="{{asset('img/customer/Frame(1).svg')}}" alt="user"></div>
            <div><img src="{{asset('img/customer/shoppingBag.png')}}" alt="cart"> <span>10</span></div>
        </div>
       
    </section>

    @yield('content')

    
    <section class="footer">
        <div class="footer-section">
            <div class="footer-social">
               <img src="image/customer/facebook-f.svg" alt="facebook">
               <img src="image/customer/twitter.svg" alt="twitter">
               <img src="image/customer/flickr.svg" alt="flickr">
               <img src="image/customer/instagram.svg" alt="instagram">
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Shop</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>

            </div>
            <div class="footer-contact">
                <h3>NEWSLETTER</h3>
                <p>Enjoy our newsletter to stay updated with the latest news and special sales.</p>
                <input type="email" placeholder="Enter your email address">
            </div>
        </div>
        <div class="sub-footer">
            <span>© 2023. All Rights Reserved.</span>
            <span><img src="image/customer/payment-gray-lighter.png.png" alt=""></span>
        </div>
    </section>
 
<!-- custom js link  -->
<script src="{{asset('js/customer/home.js')}}"></script>
<script src="{{asset('js/customer/shop.js')}}"></script>
</body>
   
</html>