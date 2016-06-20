<!DOCTYPE html>
<html lang="en">


  @include('partials._head')

  <body>

    
    @include('partials._nav')


    <div class="container">
      @include('partials._messages')
      @yield('content')         
    </div>
    
  </body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
  @yield('custom_scripts')   
</html>