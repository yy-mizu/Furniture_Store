@extends('layouts.customerLayout')
@section('title','detail || furniture')
@section('content')

{{-- @dd($product) --}}
<section class="detail-section">
        <div class="link-connect">
            <span>Home</span>
            <span>Shop</span>
            <span>Bed</span>
            <span>Modway Olivia Bed</span>
        </div>
        <div class="detail">
            <div class="detail-img" style="padding-top: 20%">
                <img src="{{asset('/img/products/'.$product->photos[0]->img)}}" alt="" width="70%">
            </div>
            <div class="detail-content"  style="padding-top: 20%">
                <h1>{{$product->name}}</h1>
                <p>${{$product->price}}</p>
                <p>{{$product->description}} </p>
                <div class="btn-gp">
                    <form action="{{ route('add_to_cart') }}" method="POST">
                        @csrf <!-- CSRF token for Laravel -->
                        <div class="btn-gp">
                            <input type="number" name="quantity" value="1" min="1"> <!-- Ensure the name attribute is set -->
                            <input type="hidden" name="id" value="{{ $product->id }}"> <!-- Pass the product ID as a hidden input -->
                            <button type="submit">Add to cart</button>
                            <a href="">Buy Now</a>
                        </div>
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

        <section class="tab-menu">
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
        </section>
        <section class="recommend">
            <h4>YOU MAY ALSO LIKE...</h4>
            <div class="card-container">
                <div class="card">
                    <div class="card-img">
                        <img src="{{asset('/image/customer/detail-card1.png')}}" alt="">
                    </div>
                      <div class="card-content">
                        <p>Haiku 2-Seater Sofa</p>
                        <p>$999.00 -$1,499.00</p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('/image/customer/detail-card2.png')}}" alt="">
                    <div class="card-content">
                        <p>Solid Wood Side Tables</p>
                        <p>$350.00</p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('/image/customer/detail-card3.png')}}" alt="">
                    <div class="card-content">
                        <p>Vipp Wool Pillow</p>
                        <p>$79.00</p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('/image/customer/detail-card4.png')}}" alt="">
                    <div class="card-content">
                        <span class="upperSpan minus">-20%</span>
                        <p>Vipp Wool Blanket</p>
                        <p><span class="mute-text">$100.00</span> $80.00</p>
                    </div>
                </div>
            </div>
        </section>
    </section>
    

@endsection
