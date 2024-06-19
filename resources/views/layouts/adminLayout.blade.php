<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/admin/staff.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/staffcreate.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/admin/customers.css') }}" type="text/css">

    {{-- PRODUCT CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin/product.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/productcreate.css') }}" type="text/css">

    {{-- CATEGORY CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin/category.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/categorycreate.css') }}" type="text/css">

    {{-- Suppliers CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin/supplier.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/admin/suppliercreate.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/admin/order.css') }}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

     
    <title>@yield('title')</title>

    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>


<script src="{{ asset('js/app.js') }}"></script>

{{-- @vite(['resources/css/app.css', 'resources/js/dropzone-config.js']) --}}
</head>

<body>

    <div class="main-page-wrapper">
        <nav class="navbar-wrapper">
            <div class="navbar-container">

                <div class="navbar-head">
                    <img src="{{ asset('img/admin/sideMenu1.png') }}" alt="" class="shop-icon">

                    <h4>Furniture Store</h4>

                    <img src="{{ asset('img/admin/sideMenu2.png') }}" alt="" class="toggle-icon">
                </div>

                <div class="navbar-body">

                <div class="navbar-item-wrapper">
                    <ul class="navbar-item-container">

                        <li  class="navbar-item">
                            <a href="{{route('admin.dashboard')}}" class="navbar-link" class="navbar-link">
                               
                                    <img src="{{ asset('img/admin/dashboard.png') }}" alt="">

                                    <h5>Dashboard</h5>
                                
                            </a>
                        </li>

                        <li  class="navbar-item">
                            <a href="{{ route('admin.productlist') }}" class="navbar-link">
                              
                                    <img src="{{ asset('img/admin/products.png') }}" alt="">

                                    <h5>Products</h5>
                                
                            </a>
                        </li>


                        <li  class="navbar-item">
                            <a href="{{ route('admin.customerlist') }}" class="navbar-link">
                               
                                    <img src="{{ asset('img/admin/customer.png') }}" alt="">

                                    <h5>Customers</h5>
                                
                            </a>
                        </li>


                        <li class="navbar-item">
                            <a href="{{ route('admin.orderlist') }}" class="navbar-link">
                                
                                    <img src="{{ asset('img/admin/order.png') }}" alt="">

                                    <h5>Orders</h5>
                                
                            </a>
                        </li>


                        <li  class="navbar-item">
                            <a href="{{ route('admin.stafflist') }}" class="navbar-link">
                              
                                    <img src="{{ asset('img/admin/staff.png') }}" alt="">

                                    <h5>Staffs</h5>
                            </a>
                        
                        </li>


                        <li  class="navbar-item">
                            <a href="{{ route('admin.categorylist') }}" class="navbar-link">
                               
                                    <img src="{{ asset('img/admin/categories.png') }}" alt="">

                                    <h5>Categories</h5>
                                
                            </a>
                        </li>

                        <li class="navbar-item">
                            <a href="{{ route('admin.supplierlist') }}" class="navbar-link">
                             
                                    <img src="{{ asset('img/admin/supplier.png') }}" alt="" style="color: white">

                                    <h5>Suppliers</h5>
                                
                            </a>
                        </li>

                        {{-- <li class="navbar-item">
                            <a href="{{ route('admin.blog') }}" class="navbar-link">
                             
                                    <img src="{{ asset('img/admin/supplier.png') }}" alt="" style="color: white">

                                    <h5>Suppliers</h5>
                                
                            </a>
                        </li> --}}
                        

                        <li class="navbar-item">
                            <a href="{{ route('admin.logout') }}" class="navbar-link">
                             
                                    <img src="{{ asset('img/admin/logout.png') }}" alt="" style="color: white">

                                    <h5>Logout</h5>
                                
                            </a>
                        </li>

                        
                    </ul>
                </div>
                </div>








            </div>


        </nav>

        <main class="admin-body-wrapper">

            <section class="admin-body-container">

                <nav class="admin-body-navbar">
                    <h3>@yield('admin-body-navbar-title')</h3>

                    <div>
                        <img src="{{ asset('img/admin/admin.png') }}" alt="">

                        <h4>@yield('admin-body-navbar-profile')</h4>

                    </div>
                </nav>

                @yield('admin-body')
            </section>
        </main>
    </div>
</body>
</div>

</html>
