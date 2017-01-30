@include('partials._head')

  <body>

@include('partials._nav')
    
    <div class="container">
      @include('partials._messages')

      <!-- {{Auth::check() ? "Logged In" : "Logged Out"}} -->
      @yield('content')

    </div>
    <!-- end of .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('js/bootstrap.min.js') }}
    @yield('scripts')
  </body>

</html>