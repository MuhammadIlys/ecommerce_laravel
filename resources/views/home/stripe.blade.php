<!DOCTYPE html>
<html>

    
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
    <title>Laravel Ecommerce</title>
    <!-- bootstrap core css -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
       <span style="font-size: 15px"> @include('home.header') </span>
        <!-- end header section -->
        <!-- slider section -->
    
<div class="container">
    
    <div class="container jumbotron text-center bg-dark text-light">
        <h1 class="" style="">Pay using card</h1>
    </div>


    
    <div class="row">
        <div class="col-md-9 col-md-offset-2">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table bg-dark text-light" >
                        <h3 class="panel-title" >Payment Details</h3>
                </div>
                <div class="panel-body">
    
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
    
                    <form 
                            role="form" 
                            action="{{ route('stripe.post',$total_price) }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label' style="font-size:15px">Name on Card</label> <input
                                    class='form-control' size='4' type='text' style="padding:20px; border-radius:30px">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label' style="font-size:15px">Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text' style="padding:20px; border-radius:30px">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label' style="font-size:15px">CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text' style="padding:20px; border-radius:30px">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label' style="font-size:15px">Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text' style="padding:20px; border-radius:30px">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label' style="font-size:15px">Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text' style="padding:20px; border-radius:30px">
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>

                        {{-- <div class="col-md-12">
                            <h1 class="text-center text-success" style="font-size: 25px; font-weight:bold;">Total Price : ${{$total_price}}</h1>
                        </div> --}}
    
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block mt-4" style="background-color: rgb(17, 16, 16); color:white" type="submit">Pay Now (${{$total_price}})</button>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>        
        </div>
    </div>
        
</div>
@include('home.footer')
      
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
    
</body>
    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
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
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
</html>