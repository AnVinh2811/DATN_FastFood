<!DOCTYPE html>
<html lang="en">
  @include('manager.template.css')
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('manager.template.sidebar')

        <!-- top navigation -->
        @include('manager.template.top')
        
        @yield('content')
       

        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    @include('manager.template.js')
	
  </body>
</html>
