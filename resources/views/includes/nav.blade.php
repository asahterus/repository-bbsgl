<section class="bg-orange">
  <div class="container">

    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <!-- Align logo (navbar-brand) to the left -->
        <a class="navbar-brand" href="#">
          <img src="{{ asset('images/logo.png') }}" width="80" height="50" alt="" srcset="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Align the links (navbar-nav) to the right -->
        <div class="collapse navbar-collapse justify-content-end gap-2" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            @guest
            
            <a class="nav-link active text-white me-2" aria-current="page" href="{{ route('login') }}">Login</a>
            
            @endguest

            @auth
            <a class="nav-link active text-white me-2" aria-current="page" href="{{ route('profile') }}">Profil</a>
            @endauth

            <a class="nav-link text-white me-2" href="{{ route('home') }}">Home</a>
            <a class="nav-link text-white me-2" href="{{ route('about') }}">About</a>
            <a class="nav-link text-white me-2" href="{{ route('latest')}}">Latest Additions</a>
            <a class="nav-link text-white me-2" href="{{ route('browse') }}">Browse</a>
            <a class="nav-link text-white me-2" href="{{ route('search') }}">Search</a>
            <a class="nav-link text-white me-2" href="{{ route('statistics') }}">Statistics</a>
            @auth
            <a class="nav-link text-white me-2" href="{{ route('upload.type') }}">Upload</a> 
            @endauth

            @auth
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="nav-link btn btn-danger active text-white me-2" aria-current="page">
                      Logout
                  </button>
              </form>
            @endauth
        

       
          </div>
        </div>
      </div>
    </nav>
  </div>
</section>