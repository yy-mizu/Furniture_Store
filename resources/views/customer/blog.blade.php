@extends('layouts.customerLayout')
@section('title','blog || furniture')

@section('content')

<div class="container">
            {{-- <h1>Blog Post</h1> --}}
            <div class="blog-post-gallery">
                <div class="blog-post-column">
            
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blogpost1.png')}}" alt="">
                        <div class="blog-post-content">
                            <p class="date"><span>Jan2, 2020</span> <span>3 comments</span></p>
                            <h2>FHow to Choose the right Color Palette for Home</h2>
                            <p><span>in </span><span>HOW TO CHOOSE</span> </p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blogpost2.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Dec 1, 2019</span> <span>0 comments</span></p>
                            <h2>Fix Up your Dining Room for the Holidays</h2>
                            <p><span>in DIY</span> <span>Home Decor</span></p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight
                                guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blogpost1.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Sep 1, 2019</span> <span>0 comments</span></p>
                            <h2>What Is Ergonomic Office Furniture?</h2>
                            <p><span>in </span><span>Life Style</span> </p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight
                                guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
            
            
                </div>
                <div class="blog-post-column">
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blog3.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Jan 1, 2020</span> <span>2 comments</span></p>
                            <h2>How to Make the Most Out of Your Backyard</h2>
                            <p><span>in </span><span>How To Choose</span> </p>
                            <p>What could be better than a leisurely card game with friends in front of the fireplace on a chilly
                                evening?</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blog4.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Nov 10, 2019</span> <span>0 comment</span></p>
                            <h2>Discounted High End Sofas in NJ Ideas</h2>
                            <p><span>in </span><span>DIY SHOPPING TIPS</span> </p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blog5.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Oct 24, 2019</span> <span>0 comment</span></p>
                            <h2>Red, White and Blue Furniture Ideas: 4th of July Fun</h2>
                            <p><span>in </span><span>DIY , HOME DECOR</span> </p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight
                                guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                </div>
                <div class="blog-post-column">
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blog6.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Dec 15, 2019</span> <span>1 comment</span></p>
                            <h2>What to Look for in a Top Home Furniture Store in NJ</h2>
                            <p><span>in </span><span>HOW TO CHOOSE</span> </p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight
                                guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blog7.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Nov 20, 2019</span> <span>0 comment</span></p>
                            <h2>All Things Freehold, NJ: Family Fun and More</h2>
                            <p><span>in </span><span>DIY ,HOME DECOR</span> </p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight
                                guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                    <div class="blog-post">
                        <img src="{{asset('/img/customer/blog8.png')}}" alt="">
                        <div class="blog-post-content">
                            <p><span>Aug 22, 2019</span> <span>0 comment</span></p>
                            <h2>6 Ideas for Furnishing a Family Room</h2>
                            <p><span>in </span><span>DIY , SHOPPING TIPS</span> </p>
                            <p>The small round table in the dinette may be great for casual meals with your family, but inviting
                                overnight
                                guests</p>
                            <button>READ MORE</button>
                        </div>
                    </div>
                </div>
            
            
            </div>
            <button class="more">Load More</button>
        </div>
@endsection