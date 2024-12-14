<base href="/public">
<html lang="en">
<head>
<meta charset="UTF-8">

<title>Famms - Fashion HTML Template</title>
@include('main.tagscss')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/"><img width="250" src="images/logo.png" alt="#" /></a>
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
                           <a class="nav-link" href="#cont">Contact</a>
                        </li>


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
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                                 <g>
                                 </g>
                              </svg>
                           </a>
                        </li>
                        {{-- <form class="form-inline"> --}}
                        <form class="">
                            <button class="btn my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                         </form>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
    <h1 class="text-center">Pay Using Card-Total Amount is ${{$totalprice}}</h1>
  <div class="container">
    <div class='row'>
      <div class='col-md-4'></div>
      <div class='col-md-4'>
        <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
        <form accept-charset="UTF-8" action={{ url('/stripe', $totalprice) }} class="require-validation"
          data-cc-on-file="false"
          data-stripe-publishable-key="pk_test_51Oby6DBmB1lrLg6WlzIbynK4QzIGZEUerBOOuGU6Z3PvF5bTroSLWckDveXOcYeAbLki2FrddwCQ1RMUMoG5ptsY00FZY891Sw"
          id="payment-form" method="post">
          @csrf
          <div class='form-row'>
            <div class='col-lg-12 form-group required'>
              <label class='control-label'>Card Holder Name</label> <input
                class='form-control' size='4' type='text' placeholder="Enter Card Holder Name">
            </div>
          </div>
          <div class='form-row'>
            <div class="col-lg-12 form-group card required">
                <label class="control-label">Card Number</label>
                <input autocomplete="off" class="form-control card-number" size="16" maxlength="19" type="text" placeholder="Enter Card number">
            </div>

          </div>
          <div class='form-row'>
            <div class='col-lg-4 form-group cvc required'>
              <label class='control-label'>CVC</label> <input
                autocomplete='off' class='form-control card-cvc'
                placeholder='CVV' size='4' type='text'>
            </div>
            <div class='col-lg-4 form-group expiration required'>
              <label class='control-label'>Expiration</label> <input
                class='form-control card-expiry-month' placeholder='MM' size='2'
                type='text'>
            </div>
            <div class='col-lg-4 form-group expiration required'>
              <label class='control-label'>YEAR</label> <input
                class='form-control card-expiry-year' placeholder='YYYY'
                size='4' type='text'>
            </div>
          </div>
          <!-- <div class='form-row'>
            <div class='col-md-12'>
              <div class='form-control total btn btn-info'>
                Total: <span class='amount'>$300</span>
              </div>
            </div>
          </div> -->
          <div class='form-row'>
            <div class='col-md-12 form-group'>
              <button class='form-control btn btn-primary submit-button'
                type='submit' style="margin-top: 10px;">Confirm</button>
            </div>
          </div>

        </form>
        @if ((Session::has('success-message')))
        <div class="alert alert-success col-md-12">{{
          Session::get('success-message') }}</div>
        @endif @if ((Session::has('fail-message')))
        <div class="alert alert-danger col-md-12">{{
          Session::get('fail-message') }}</div>
        @endif
      </div>
      <div class='col-md-4'></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"
    integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
    crossorigin="anonymous"></script>
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
    crossorigin="anonymous"></script>
  <script>
    $(function() {
        $('form.require-validation').bind('submit', function(e) {
          var $form         = $(e.target).closest('form'),
              inputSelector = ['input[type=email]', 'input[type=password]',
                               'input[type=text]', 'input[type=file]',
                               'textarea'].join(', '),
              $inputs       = $form.find('.required').find(inputSelector),
              $errorMessage = $form.find('div.error'),
              valid         = true;

          $errorMessage.addClass('hide');
          $('.has-error').removeClass('has-error');
          $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
              $input.parent().addClass('has-error');
              $errorMessage.removeClass('hide');
              e.preventDefault(); // cancel on first error
            }
          });
        });
      });

      $(function() {
        var $form = $("#payment-form");

        $form.on('submit', function(e) {
          if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
              number: $('.card-number').val(),
              cvc: $('.card-cvc').val(),
              exp_month: $('.card-expiry-month').val(),
              exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
          }
        });

        function stripeResponseHandler(status, response) {
          if (response.error) {
            $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
          } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            console.log(token);
            $form.get(0).submit();
          }
        }
      })
    </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var cardNumberInput = document.querySelector('.card-number');
        cardNumberInput.addEventListener('input', function() {
            // Remove non-numeric characters
            var cardNumber = this.value.replace(/\D/g, '');
            // Format the card number in groups of four digits
            var formattedCardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');
            // Update the input value with the formatted card number
            this.value = formattedCardNumber;
        });
    });
</script>


 @include('main.subscribe')

 <!-- footer start -->
 @include('main.footer')
 <!-- footer end -->
@include('main/tagsjs')
