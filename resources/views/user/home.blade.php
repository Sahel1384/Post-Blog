@extends('user.index')
  @section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>

    <!-- bootstrap link start -->
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" /> --}}
    <!-- bootstrap link end -->

    <!-- bootstrap icons start -->
    <link rel="stylesheet" href="{{ asset('links/bootstrap-icons/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('links/boxicons/css/boxicons.css') }}" />
    <!-- bootstrap icons end -->

    <!-- custom css start -->
    <link rel="stylesheet" href="{{ asset('links/css links/home.css') }}" />
    <!-- custom css end -->

    <!-- responsive page css start -->
    <link rel="stylesheet" href="{{ asset('links/css links/home_responsive.css') }}" />
    <!-- responsive page css end -->
  </head>
  <body>

    <!-- body section start -->

    <!-- post cards section start -->
    <div class="container mt-5">
      <div class="row gy-3">
        @foreach ($post as $val)
        <div class="col-md-4">
          <div class="cards">
            <div class="img-user">
              <div>
                <img src="links/img/search.png" alt="" /><span>M.Sahel</span>
              </div>
              <i class="bi bi-three-dots-vertical"></i>
            </div>
            <div id="card-info" class="mt-5">
              <h4>{{ $val->title }}</h4>
              <p>
                {{ $val->discription  }}
              </p>
            </div>
            <div id="card-img">
              <img src="{{ '/storage/' . $val->image }}" alt="" />
            </div>
            <div id="card-icon" class="mt-1">
              <div>
                <i title="comment" class="bi bi-chat"></i>
                <p>109</p>
              </div>
              <div>
                <i title="share" class="bi bi-share"></i>
                <p>5</p>
              </div>
              <div>
                <i title="Download" class="bi bi-cloud-download"></i>
                <p>30</p>
              </div>
              <div>
                <i title="Like" class="bi bi-hand-thumbs-up"></i>
                <p>1.5k</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
    <!-- post cards section end -->

    <!-- body section end -->

   
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
  </body>
</html>

@endsection