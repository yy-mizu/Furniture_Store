@extends('layouts.customerLayout')
@section('title','contact || furniture')
@section('content')
<section class="contact">
        <div class="map">
            <iframe src="https://maps.app.goo.gl/KiWugwdUNhZkQkTV9"></iframe>
            
        </div>
        <div class="contact-div">
            <div class="contact-message">
                <p>LET'S TALK TO US</p>
                <div class="name">
                    <input type="text" placeholder="First Name">
                    <input type="text" placeholder="Last Name">
                </div>
                <input type="email" placeholder="Someone@gmail.com">
                <textarea name="" id="" cols="20" rows="7" placeholder="Enter Your Message"></textarea>
                <button>Submit</button>
            </div>
            <div class="contact-address">
                <div class="contact-box">
                    <p>ADDRESS</p>
                    <p>17 Elimatta Dr, Ashgrove QLD 4060, Australia.</p>
                </div>
                <div class="contact-box">
                    <p>PHONE NUMBER</p>
                    <p>(+84) 8 3555 3203 <br>(+84) 8 3777 3203</p>
                </div>
                <div class="contact-box">
                    <p>EMAIL</p>
                    <p>themesky.info@gmail.com <br>support.info@gmail.com</p>

                </div>
            </div>
        </div>
   </section>

@endsection
