@extends('layout.index')
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

    <div class="container">
        <div class="row gy-3 ">
            <div class="col-md-12">
                <div class="cards">
                    <div class="img-user">
                        <div id="img-sub">
                        <img src="{{ '/storage/' . $posts->user->image }}" alt="" /><div>
                            <span>{{ $posts->user->name }}</span>
                            <p class="p">{{ $posts->date }}</p>
                        </div>
                        </div>
                        <div id="img-icon">
                        <span class="btn btn-sm btn-close mt-1"></span>
                        <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </div>
                    <a href="{{ route('seeComment', $posts->id) }}" class="text-decoration-none text-dark">
                        <div id="card-info" class="mt-4">
                        <h4>{{ $posts->title }}</h4>
                        <p>
                            {{ $posts->discription  }}
                        </p>
                        </div>
                        <div id="card-img">
                        <img src="{{ '/storage/' . $posts->image }}" alt="" />
                        </div>
                    </a>
                    <div id="car-icon" class="mt-4">
                        <div class="row gy-3">
                            @foreach ($comments as $comment)
                                <div class="col-md-4">
                                    <div id="comments-box">
                                        <div id="comment-img">
                                            <img src="{{ '/storage/'.$comment->user->image }}" alt=""width="50px" height="50px" id="comment_img">
                                            <p> {{ $comment->user->name }}</p>
                                        </div>
                                        <div id="comments-text">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- post cards section end -->

    <!-- body section end -->
    @push('app')
    <script>
      let navbar_icons_img = document.querySelector("#navbar-icons-img");
  let account = document.querySelector("#account");
  
  navbar_icons_img.addEventListener("click", () => {
      account.classList.toggle("account1");
  });
  
  let filter_btn = document.querySelector("#filter-btn");
  let filter_menu = document.querySelector(".filter-menu");
  
  filter_btn.addEventListener("click", function () {
      filter_menu.classList.toggle("filter-menu-1");
      document.querySelector(".bi-chevron-right").classList.toggle("rotate");
  });
  
    </script>
  @endpush  
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
  </body>
</html>

@endsection