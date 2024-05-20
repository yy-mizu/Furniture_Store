@extends('layouts.customerLayout')
@section('title','stroy || furniture')
@section('content')
<section class="story">
        <div class="story-content">
            <h1>Our Story</h1>
            <p>Our wonderful story starts back in 1973 when the first Monsoon boutique opened on London’s Beauchamp Place.</p><br>
            <p>Today, our two great sister brands have an international presence with over 1,000 stores around the world. Throughout
            the UK and much further a field.</p>
        </div>
        <div class="story-img">
            <img src="{{asset('/image/customer/story.png')}}" alt="">
        </div>
    </section>
    <section class="member">
        <h1>OUR GREAT TEAM</h1>
        <div class="member-card-container">
            <div class="member-card">
                <div class="member-img">
                    <img src="{{asset('/image/customer/member1.png')}}" alt="">
                </div>
                <div class="member-content">
                    <p>Frances Rodriguez</p>
                    <p>Designer</p>
                </div>
            </div>
            <div class="member-card">
                <div class="member-img">
                    <img src="{{asset('/image/customer/member2.png')}}" alt="">
                </div>
                <div class="member-content">
                    <p>Martha Garza</p>
                    <p>CEO</p>
                </div>
            </div>
            <div class="member-card">
                <div class="member-img">
                    <img src="{{asset('/image/customer/member3.png')}}" alt="">
                </div>
                <div class="member-content">
                    <p>Willie Robertson</p>
                    <p>Photographer</p>
                </div>
            </div>
            <div class="member-card">
                <div class="member-img">
                    <img src="{{asset('/image/customer/member4.png')}}" alt="">
                </div>
                <div class="member-content">
                    <p>Jean Kelley</p>
                    <p>Co-Founder</p>
                </div>
            </div>
            <div class="member-card">
                <div class="member-img">
                    <img src="{{asset('/image/customer/member5.png')}}" alt="">
                </div>
                <div class="member-content">
                    <p>Douglas Dean</p>
                    <p>Technical Manager</p>
                </div>
            </div>
            <div class="member-card">
                <div class="member-img">
                    <img src="{{asset('/image/customer/member6.png')}}" alt="">
                </div>
                <div class="member-content">
                    <p>Alexander Fields</p>
                    <p>Art Director</p>
                </div>
            </div>
        </div>
    </section>
    <section class="story1">
        <div class="story1-content">
            <p>Duis congue viverra gravida. Suspendisse sed facilisis lorem. Nullam id malesuada sapien. Etiam pulvinar gravida
                tortor
                ut sagittis. Nunc suscipit ornare lectus, eget imperdiet leo.</p>
            <p>Douglas Dean</p>
            <p>Technical Manager</p>
        </div>
       
    </section>
    <section class="service">
        <h1>OUR SERVICES</h1>
        <div class="service-card-container">
            <div class="service-card">
                <div class="service-img">
                    <img src="{{asset('/image/customer/service1.png')}}" alt="">
                </div>
                <div class="service-content">
                    <p>EASY PAYMENT</p>
                    <p>Fusce iaculis gravida lectus sed hendrerit. Aenean nec ipsum a ex eleifend porttitor</p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img">
                    <img src="{{asset('/image/customer/service2.png')}}" alt="">
                </div>
                <div class="service-content">
                    <p>EASY PAYMENT</p>
                    <p>Fusce iaculis gravida lectus sed hendrerit. Aenean nec ipsum a ex eleifend porttitor</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-img">
                    <img src="{{asset('/image/customer/service3.png')}}" alt="">
                </div>
                <div class="service-content">
                    <p>EASY PAYMENT</p>
                    <p>Fusce iaculis gravida lectus sed hendrerit. Aenean nec ipsum a ex eleifend porttitor</p>
                </div>
            </div>

            <div class="service-card">
                <div class="service-img">
                    <img src="{{asset('/image/customer/service4.png')}}" alt="">
                </div>
                <div class="service-content">
                    <p>EASY PAYMENT</p>
                    <p>Fusce iaculis gravida lectus sed hendrerit. Aenean nec ipsum a ex eleifend porttitor</p>
                </div>
            </div>

        </div>
    </section>

@endsection
