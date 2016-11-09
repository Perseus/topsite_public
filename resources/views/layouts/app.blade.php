<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href=" {{ URL::asset('css/app.css') }} " rel="stylesheet">
    <link href=" {{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  
    <script src='https://www.google.com/recaptcha/api.js'></script> 
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar">aaaaaaaa</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
  



            <div class="container">
           
                <div class="row">
                    <div class="col-md-2 col-md-offset-0">
                      
                        @if (Auth::guest())
                          <div class="panel panel-default">
                            <div class="panel-heading">Quick Links</div>
                            <div class="panel-body">
                            <ul class="list-unstyled">
                              <li>    <a href=" {{ url('/login') }}" > Login</a> </li>
                              <li>    <a href=" {{ url('/register') }} ">   Register</a>  </li>
                              <li>    <a href=" {{ url('/downloads') }} "> Downloads </a> </li>
                              <li>    <a href=" {{ url('/ranking') }} "> Rankings </a> </li>
                            </ul>
                            </div>  
                            </div>
                         @else
                             @if(Auth::user()->isAdmin())
                            <div class="panel panel-default">
                                <div class="panel-heading"> Admin pages </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled">
                                        <li> <a href="{{ url('admin/news/') }}"> Manage: News </a> </li>
                                        <li> <a href="{{ url('admin/downloads/') }}"> Manage: Downloads </a> </li>
                                        <li> <a href="{{ url('admin/categories/add') }}"> Manage: Categories </a> </li>
                                        <li> <a href="{{ url('admin/authors/add') }}"> Manage: Authors </a> </li>
                                    </ul>
                                </div>
                            </div>
                             @endif
                           <div class="panel panel-default">
                            <div class="panel-heading"> Account </div>
                            <div class="panel-body">

                            Name : <span class="username">  {{ Auth::user()->name }} </span>
                               </div>
                            </div>
                               <div class="panel panel-default">
                            <div class="panel-heading">Quick Links</div>
                            <div class="panel-body">
                            <ul class="list-unstyled">

                              <li>    <a href=" {{ url('/downloads') }} "> Downloads </a> </li>
                              <li>    <a href=" {{ url('/ranking') }} "> Rankings </a> </li>
                            </ul>
                            </div>  
                            </div>
                        @endif

                         
                    
                   
                        <div class="panel panel-default">
                            <div class="panel-heading"> Server Statistics </div>
                            <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>   Accounts : <span> 10 </span> </li>
                                <li>   Characters : <span> 20 </span> </li>
                                <li>   Guilds : <span> 5 </span> </li>
                                <li>   Current Online : <span> 15 </span> </li>
                                <li>   Online record : <span> 20 </span> </li>
                            </div>
                        </div>

                         <div class="panel panel-default">
                            <div class="panel-heading"> Server Information </div>
                            <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>   Solo EXP Rate : <span> {{ env('SOLO_EXP') }}x </span> </li>
                                <li>   Party EXP Rate : <span> {{ env('PARTY_EXP') }}x </span> </li>
                                <li>   Drop Rate : <span> {{ env('DROP_RATE') }}x  </span> </li>
                                <li>   Ship EXP Rate : <span> {{ env('SHIP_EXP')}}x  </span> </li>
                            </div>
                        </div>
                   
                    </div>

               
                    @yield('content')
                    <div class="col-md-3 col-md-offset-0">
                        <div class="panel panel-default">
                            <div class="panel-heading">Staff Online</div>

                            <div class="panel-body">    
                                    None
                            </div>  
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">  Social networks </div>
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"> <div class="fb-page" 
                                              data-href="https://www.facebook.com/facebook"
                                              data-width="380" 
                                              data-hide-cover="false"
                                              data-show-facepile="false" 
                                              data-show-posts="false"></div></li>
                                        <li class="list-group-item"> <a class="twitter-timeline"   data-tweet-limit="1" href="https://twitter.com/TwitterDev">Tweets by TwitterDev</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            <footer>

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> There's no copyright here lel. Use as you wish. Just leave this here-> powered by topCMS 1.0.0 </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

            </div>

</div>

    <!-- Scripts -->
    <script src=" {{ URL::asset('js/app.js') }} "></script>

</body>
</html>
