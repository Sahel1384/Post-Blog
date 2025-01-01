<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashbpard Page</title>

    <!-- bootstrap link start -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" />
    <!-- bootstrap link end -->

    <!-- bootstrap icons start -->
    <link rel="stylesheet" href="{{ asset('links/bootstrap-icons/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('links/boxicons/css/boxicons.css') }}" />
    <!-- bootstrap icons end -->

    <!-- custom css start -->
    <link rel="stylesheet" href="{{ asset('links/css links/index.css') }}" />
    <!-- custom css end -->

    <!-- responsive page css start -->
    <link rel="stylesheet" href="{{ asset('links/css links/index_responsive.css') }}" />
    <!-- responsive page css end -->

    <link rel="stylesheet" href="{{ asset('links/icon/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('links/icon/fontawesome.min.css') }}">
  </head>

  <body>
    <div class="container-fluid navbar">
      <div class="img-search">
        <img src="{{ asset('links/img/Screenshot_2024-09-11_020733-removebg-preview.png') }}" alt="" />
        <form action="{{ route('searchData') }}" method="GET">
          @csrf
          <input type="text" name="search" placeholder="Search Anything" id="search" />
        </form>
      </div>
      <div class="nabvar-menu">
        <ul>
          <li>
            <a href="{{ route('user_sign_up.index') }}">
              <span class="bi bi-house-fill active"></span>
            </a>
          </li>
          <li>
            <span class="bi bi-people"></span>
          </li>
          <li>
            <span class="bi bi-camera-video"></span>
          </li>
          <li>
            <span class="bi bi-shop"></span>
          </li>
        </ul>
      </div>

      <div class="navbar-icons">
        <a href="#">
          <span class="bi bi-bell-fill"></span>
        </a>
        <div id="navbar-icons-img">
          <img src="{{ '/storage/' .Auth::user()->image  }}" alt="" />
        </div>
        <span
          class="bi bi-justify"
          id="offcanvas"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasnav"
        ></span>
      </div>
    </div>

    <div id="account">
      <div id="self-inf">
        <div id="self-sub">
          <img src="{{ '/storage/' .Auth::user()->image  }}" alt="" class="mt-2" />
          <p class="mt-3 mx-2">{{Auth::user()->name}}</p>
        </div>
        <hr>
        <div>
          <p id="email">{{ Auth::user()->email }}</p>
        </div>
      </div>
      <div id="account-ul">
        <ul>
          <li><a href="{{ route('profileSetting') }}">Profile Settings</a></li>
          <li><a href="{{ route('accountSetting') }}">Account Settings</a></li>
          <li><a href="{{ route('passwordSetting') }}">Change Password</a></li>
        </ul>
        <a href="{{ route('logout') }}" id="logout">Log out <span class="bi bi-box-arrow-right"></span></a>
      </div>
    </div>

    <!-- body section start -->
    <div class="sidebar">
      <div id="self-info">
        <img src="{{ '/storage/' .Auth::user()->image  }}" alt="" />
        <p class="mt-1">{{Auth::user()->name}}</p>
      </div>
      <hr />
      <a href="{{ route('overView') }}">Overview Section</a>
      <a href="{{ route('myPost') }}">My Post</a>
      <a href="{{ route('post.index') }}">Create New Post</a>
      <a href="">Comments</a>
      <a href="{{ route('profileSetting') }}">Profile</a>
      <a href="{{ route('settingSection') }}">User Settings</a>
    </div>

    <div class="main">
      @yield('content')
    </div>
    <!-- body section end -->

    <!-- offcanvas start -->
    <div
      class="offcanvas offcanvas-start"
      tabindex="-1"
      id="offcanvasnav"
      aria-labelledby="offcanvasNavbarLabel"
    >
      <div class="offcanvas-header">
        <div class="mt-2">
          <!-- <img src="sub_pages/img/pexels-photo-262978.webp" id="f-img" alt="" /> -->
          <h5>Dashboard</h5>
        </div>
        <button
          type="button"
          class="btn-close bg-white"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body of-body">
        <div class="sidebox2">
          <a href="{{ route('user_sign_up.index') }}">Home Page</a>
          <a href="{{ route('overView') }}">Overview Section</a>
          <a href="{{ route('myPost') }}">My Post</a>
          <a href="{{ route('post.index') }}">Create New Post</a>
          <a href="">Comments</a>
          <a href="{{ route('profileSetting') }}">Profile</a>
          {{-- <a href="{{ route('settings') }}">Settings</a> --}}
        </div>
      </div>
    </div>
    <!-- offcanvas end -->


    @stack('app');
    <script src="{{ asset('links/app.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
  </body>
</html>
