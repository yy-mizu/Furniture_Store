@extends('layouts.customerLayout')
@section('title','detail || furniture')
@section('content')

{{-- @dd($related_products[0]->photos[0]->img) --}}
<section class="detail-section">
        <div class="link-connect">
            <span>Home</span>
            <span><a href="{{route('customer.shop')}}">Shop</a></span>
            <span><a href="{{route('customer.shop')}}">{{$product->name}}</a></span>
            <span>Modway Olivia Bed</span>
        </div>
        <div class="detail">
            <div class="detail-img" >
                <img src="{{asset('/img/products/'.$product->photos[0]->img)}}" alt="" width="70%">
            </div>
            <div class="detail-content"  >
                <h1>{{$product->name}}</h1>
                <p>${{$product->price}}</p>
                <p>{{$product->description}} </p>
                <div class="btn-gp">
                    <form method="POST" action="{{ route('add_to_cart') }}" style="display: flex;align-items:center;flex-direction:row; gap:20px">
                        @csrf
                        <input type="number" name="quantity" value="1" min="1">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button type="submit">Add to Cart</button>
                    </form>
                    
                    
                    <form method="POST" action="{{ route('customer.buynow') }}">
                        @csrf
                        <input type="hidden" name="quantity" value="1" >
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button type="submit">Buy Now</button>
                    </form>
                       
                         
                       
                  
                    
                </div>
                <p>SKU:{{$product->product_code}}</p>
                <p>Categories: {{$product->category->name}}</p>
                <p>Tags: theme-sky, upstore, WooCommerce, WordPress</p>
                <div class="social">
                    <img src="{{asset('/img/customer/detail-facebook.png')}}" alt="">
                    <img src="{{asset('/img/customer/detail-twitter.png')}}" alt="">
                    <img src="{{asset('/img/customer/detail-pinterest.png')}}" alt="">
                    <img src="{{asset('/img/customer/detail-linkin.png')}}" alt="">
                    <img src="{{asset('/img/customer/detail-reddit.png')}}" alt="">
                </div>
            </div>
            <div class="detail-img-view">
                <img src="{{asset('/img/customer/detail-side-view.png')}}" alt="">
                <img src="{{asset('/img/customer/detail-front-view.png')}}" alt="">
            </div>
        </div>

        {{-- <section class="tab-menu">
            <div class="tab-nav">
                <button class="" onclick="openMenu('description')"><a>DESCRIPTION</a></button>
                <button class="" onclick="openMenu('additional')"><a>ADDITIONAL INFORMATION</a></button>
            </div>
            <div id="description" class="menu ">
                <p>The All in One Fully Upholstered Shelter Queen Bed upholstered bed is designed to add a contemporary flair to many of
                    today’s modern homes. The button tufted headboard is inset w/ two wings, giving it a contemporary shelter feel. Also
                    features a matching low
                    profile footboard and hinged / folding side rails.</p>
                <h3>Features</h3>
                <div class="text-indent cutoff-text">
                    <p>Materials: wood,foam,polyster</p>
                    <p>100% polyster fabric cover</p>
                    <p>plywood panel construction with thick foam padding</p>
                </div>
                
            
                <input class="expand-btn" type="checkbox">
            
            </div>
            <div id="additional" class="menu" style="display: none">
                <p class="cutoff-text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores consequuntur quia adipisci sed quis
                    tenetur quod molestiae quos corrupti eius itaque impedit facere aliquam, atque nesciunt architecto
                    suscipit, incidunt officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis iure sit
                    commodi delectus eveniet tempora, expedita possimus eius, eligendi quidem impedit laboriosam natus
                    dolores nulla. Vitae, quia. Possimus, fugiat sunt. Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Reprehenderit nihil vitae aut sunt ab quaerat qui quos cumque, nulla sequi modi laboriosam cum
                    explicabo nostrum dolorum expedita! Odio, modi numquam? Lorem ipsum dolor, sit amet consectetur
                    adipisicing elit. Magni ipsum ipsam sit magnam quos! Quaerat laudantium autem nobis, laborum eos maiores
                    obcaecati debitis magnam corporis similique sit minima. Aliquid, mollitia!
                </p>
                <input class="expand-btn" type="checkbox">
            </div>
        </section> --}}
        <section class="recommend">
            <h4>YOU MAY ALSO LIKE...</h4>
           

            <div class="product-card-container">

                @foreach ($related_products as $related)
                    
                <a class="card-link" href="{{url('/detail/'.$related->id)}}">
                <div class="product-card">
                    <div class="product-card-image">
                        <img src="{{asset('img/products/'.$related->photos[0]->img)}}" alt="">
                        <span class="sale">Sale</span>
                    </div>
                    <div class="product-card-content">
                        <p>{{$related->name}}</p>
                        <p>${{$related->price}}</p>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </section>
    </section>
    


@endsection
