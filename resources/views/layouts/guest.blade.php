<!doctype html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>
  <body>


      @include('includes.nav')
      @include('includes.banner')

      <main class="container-fluid row position-relative">  
        <div class="position-absolute top-50 start-50 translate-middle loader">
          <div class="d-flex align-items-center justify-content-center">
  
            <div class="spinner-grow text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow" style="color:rgb(93, 171, 44)" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow" style="color:rgb(226, 115, 3)" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
  
          </div>
        </div>

        @yield('content')

        
      </main> 
 
      <footer>
        @include('includes.footer')
      </footer>

  
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      $(document).ready( function () {
          $('.loader').remove();
          $('.content').removeClass('d-none');
      } );

  </script>

    @stack('scripts')
    
  </body>
</html>