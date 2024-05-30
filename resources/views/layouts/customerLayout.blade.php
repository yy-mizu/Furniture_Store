<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/story.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>



    <section class="top-nav">
        <div class="left">
            <div><img src="{{ asset('img/customer/vector.svg') }}" alt="facebook"></div>
            <div><img src="{{ asset('img/customer/instagram 1.svg') }}" alt="instargam"></div>
            <div><img src="{{ asset('img/customer/youtube 1.svg') }}" alt="youtube"></div>
            <div><img src="{{ asset('img/customer/telegram-original 1.svg') }}" alt="telegram"></div>
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
                <a href="{{ route('customer.home') }}">Home</a>
                <a href="{{ route('customer.shop') }}">Shop</a>


                <div class="mega-dropdown">
                    <button class="dropbtn">Category
                        <img src="{{ asset('img/customer/caret-down-solid.svg') }}" alt="">
                    </button>
                    <div class="mega-dropdown-content">

                        <div class="content-row">
                            <div class="column">
                                <h3>CATEGORY ONE </h3>
                                <div class="column">
                                    <a href="">Bed</a>
                                    <a href="#">Cabinet</a>
                                    <a href="#">Sofa</a>
                                    <a href="#">Kitchen</a>
                                    <a href="#">Office</a>
                                    <a href="#">Chair</a>
                                </div>
                            
                            </div>
                            <div class="image-column">
                                <img src="{{ asset('img/customer/megaMenu1.jpg') }}" alt="">
                                <img src="{{ asset('img/customer/megaMenu2.jpg') }}" alt="">
                            </div>

                        </div>
                    </div>
                </div>

                <a href="{{ route('customer.blogs') }}">Blog</a>
                <a href="{{ route('customer.about') }}">About Us</a>

                <a href="{{ route('customer.contact') }}">Contact</a>
            </div>
        </div>

        <div class="nav-right">
            <div><img src="{{ asset('img/customer/Frame.svg') }}" alt="magnifying glass"></div>
           
            <div>
                <a href="{{route('customer.account')}}">
                    <img src="{{ asset('img/customer/Frame(1).svg') }}" alt="user">
                </a>
            </div>
           
           
            <div class="dropdown">
                <img src="{{ asset('img/customer/shoppingBag.png') }}" alt="cart">
                <span class="cart-count">{{ count((array) session('cart')) }}</span>
                <div class="dropdown-content">
                    @if (session('cart'))
                        <ul class="cart-items">

                            @php $total = 0 @endphp



                            @foreach (session('cart') as $id => $details)
                                @if ($loop->index < 3)
                                    <li class="cart-item">
                                        <img src="{{ asset('img/products/' . $details['img']) }}" width="90px">
                                        <div class="item-info">
                                            <p class="item-name">{{ $details['product_name'] }}</p>
                                            <p class="item-price"><small>Price : $</small>{{ $details['price'] }}</p>
                                            <p class="item-quantity"><small>Quantity :
                                                </small>{{ $details['quantity'] }}</p>
                                        </div>
                                    </li>
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endif
                            @endforeach
                       
                        </ul>
                    

                    <div class="cart-total">
                        Total: <p class="total-amount">{{ $total }}</p>
                    </div>
                    <button class="view-all-btn">
                       <a href="{{route('customer.cart')}}" style="text-decoration: none; color:white;">
                        View Cart  {{ count((array) session('cart')) }} items
                    </a> 
                    </button>

                @else
                
                <div class="cart-blank">
                    <p>No items in the cart</p>
                </div>
                
                @endif

                </div>
                
                

               
            </div>
        </div>


    </section>

    @yield('content')
    
@include('customer.footer')

    
    <!-- custom js link  -->
    <script src="{{ asset('js/customer/home.js') }}"></script>
    <script src="{{ asset('js/customer/shop.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.image-list').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: "<button type='button' class='slick-prev'> &#10094</button>",
                nextArrow: "<button type='button' class='slick-next'> &#10095 </button>"
            });
        });

        document.querySelectorAll('.home-gird-card img').forEach((img) => {
            img.addEventListener('mouseover', function() {
                this.style.transform = 'scale(1.2)';
            });
            img.addEventListener('mouseout', function() {
                this.style.transform = 'scale(1)';
            });
        });
    </script>


    <script>
        function openMenu(menuItem) {
            var i;
            var x = document.getElementsByClassName("menu");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(menuItem).style.display = "block";

            $(document).ready(function() {
                $('.navbar-title').click(function() {
                    var target = $(this).data('target');
                    $('.container').removeClass('active');
                    $(target).addClass('active');
                    $('.navbar-title').removeClass('active');
                    $(this).addClass('active');
                });
            });




        }
    </script>

<script type="text/javascript">
    
 
    

$(".updatebtn").click(function(e) {
    e.preventDefault();

    
    $("tr").each(function() {
        var ele = $(this).find(".cart_update");

      
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.val() // Get the quantity from the input
            },
            success: function(response) {
                // Handle the response here if needed
                window.location.reload();
            }
        });
    });

    // Reload the page after all AJAX calls are initiated
    
});


    $(".cart_remove").click(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });


    $(".clearbtn").click(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('clear_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    
</script>








</body>

</html>
