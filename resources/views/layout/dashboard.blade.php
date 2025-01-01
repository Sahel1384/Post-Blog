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
  </head>

  <body>
    <section class="dashboard">
      <!-- sidebar start -->
      <div class="sidebar">
        <div class="sidebox1">
          <h5>Dashboard</h5>
        </div>

        <div class="sidebox2">
          <a href="">Overview Section</a>
          <a href="{{ route('post_form.index') }}">My Post</a>
          <a href="{{ route('post.index') }}">Create New Post</a>
          <a href="">Comments</a>
          <a href="">Profile</a>
          <a href="">Settings</a>
        </div>

        <div class="sidebox3">
          <div class="sub">
            <p>User Image</p>
            <p>User Name</p>
          </div>
          <p>User Email</p>
        </div>
      </div>

      <!-- sidebar end -->

      <!-- main div start -->
      <div class="main">
        <div class="navbar">
          <div class="navbox1">
            <span class="bi bi-justify" id="remove-dashboard"></span>
            <span
              class="bi bi-justify"
              id="offcanvas"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasnav"
            ></span>
          </div>
          <div class="navbox2">
            <input type="text" id="search" />
          </div>
          <div class="navbox3">
            <i class="bi bi-bell-fill"></i>
            <i class="bi bi-arrow-90deg-right"></i>
          </div>
        </div>

        @yield('content')
      </div>
      <!-- main div end -->
    </section>

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
          <a href="">Overview Section</a>
          <a href="">My Post</a>
          <a href="">Create New Post</a>
          <a href="">Comments</a>
          <a href="">Profile</a>
          <a href="">Settings</a>
        </div>

        <div class="sidebox3">
          <div class="sub">
            <p>User Image</p>
            <p>User Name</p>
          </div>
          <p>User Email</p>
        </div>
        <div class="d-flex mt-5">
          <i class="bi bi-bell-fill mx-4"></i>
          <i class="bi bi-arrow-90deg-right ms-auto me-3"></i>
        </div>
      </div>
    </div>
    <!-- offcanvas end -->

    <script src="links/app.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
  </body>
</html>
