<!DOCTYPE html>
<html>
   
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
@include('main.tagscss')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/"><img width="200" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse  mt-5" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link " href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="#why">About</a></li>
                              <li><a href="#new">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#product">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#blog">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('show_order') }}">
                               @auth
                               [{{ \App\Models\Order::getTotalItems() }}]Order
                               @else
                                   Order
                               @endauth
                           </a>
                       </li>
                       
                        {{-- <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">[{{ \App\Models\Order::getTotalItems() }}] Order</a>
                        </li> --}}
                     
                    
                        @if (Route::has('login'))
                        @auth
                            {{-- <li class="nav-item"> --}}
                        <div class="">

                            @include('layouts.appas')
                        </div>
                            {{-- </li> --}}
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                    
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}"> 
                              @auth
                              [{{ \App\Models\Cart::getTotalItems() }}]<i class="fa-solid fa-cart-shopping"style="font-size:15px;"></i>
                              @else
                              <i class="fa-solid fa-cart-shopping"style="font-size:15px;"></i>                              @endauth
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_wishlist')}}"> 
                              @auth
                              [{{ \App\Models\Wishlist::getTotalItems() }}]<i style="font-size:15px" class="fa-solid">&#xf08a;</i>
                              @else
                              <i style="font-size:15px" class="fa-solid">&#xf08a;</i>                              @endauth
                           </a>
                        </li>
                        {{-- <form class="form-inline"> --}}
                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>