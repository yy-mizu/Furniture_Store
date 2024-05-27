
                {{-- @foreach ($products as $product) --}}
                    
                
                <div class="product-card">
                    <div class="product-card-image">
                        <img src="{{asset('img/products/'.$product->img)}}" alt="">
                        <span class="sale">Sale</span>
                    </div>
                    <div class="product-card-content">
                        <p>{{$product->name}}</p>
                        <p>${{$product->price}}</p>
                    </div>
                </div>
                {{-- @endforeach --}}
