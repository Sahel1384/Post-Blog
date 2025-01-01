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

    <!-- body section start -->

    <!-- post cards section start -->
    <div class="container">
      <div class="dropdowns d-flex justify-content-between mb-3">
        <div>
          <h3>All Categories</h3>
        </div>
        <div id="filter">
          <div class="d-flex justify-content-around" id="filter-btn">
            <button type="button">Categories</button><span class="bi bi-chevron-right"></span>
          </div>
          <div class="filter-menu">
            <a href="{{ route('user_sign_up.index') }}" class="">All</a>
            <a href="{{ route('computerCate') }}" class="">Computer</a>
            <a href="{{ route('mobileCate') }}" class="">Mobile</a>
            <a href="{{ route('sportCate') }}" class="">Sport</a>
          </div>
          </div>
      </div>
      <hr>
      <div class="row  gy-3 d-flex justify-content-center">
        @foreach ($user as $val)
            @foreach ($val->posts as $post)
            <div class="col-md-4">
                <div class="cards">
                  <div class="img-user">
                    <div id="img-sub">
                      <img src="{{ '/storage/' . $val->image }}" alt="" /><div>
                        <span>{{ $val->name }}</span>
                        <p class="p">{{ $post->date }}</p>
                      </div>
                    </div>
                    <div id="img-icon">
                      <span class="btn btn-sm btn-close mt-1"></span>
                      <i class="bi bi-three-dots-vertical"></i>
                    </div>
                  </div>
                  <a href="{{ route('seeComment', $post->id) }}" class="text-decoration-none text-dark">
                    <div id="card-info" class="mt-4">
                      <h4>{{ $post->title }}</h4>
                      <p>
                        {{ \Illuminate\Support\Str::limit($post->discription, 10, ' More...') }}
                      </p>
                    </div>
                    <div id="card-img">
                      <img src="{{ '/storage/' . $post->image }}" alt="" />
                    </div>
                  </a>
                  <div id="card-icon" class="mt-1">
                    <div>
                      <a href="{{ route('comment', $post->id) }}" class="text-dark"><i class="bi bi-chat {{ $post->comments()->where('user_id',Auth::id())->exists() ? 'text-primary' : "text-dark" }}"></i></a>
                      <p>{{ $post->comments_count }}</p>
                    </div>
                    <div class="mt-1">
                      <a href="{{ route('share', $post->id) }}" class="text-dark"><i class="bi bi-share {{ $post->shares()->where('user_id', Auth::id())->exists() ? 'text-primary' : 'text-dark' }}"></i></a>
                      <p>{{ $post->shares_count }}</p>
                      {{-- <form action="{{ route('posts.duplicate', $post->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn m-0"><i class="bi bi-share"></i></button>
                      </form> --}}
                    </div>
                    <div>
                      <a href="{{ route('views', $post->id) }}" class="text-dark"><i class="bi bi-eye {{ $post->views()->where('user_id',Auth::id())->exists() ? 'text-primary' : "text-dark" }}"></i></a>
                      <p>{{ $post->views_count }}</p>
                    </div>
                    <div>
                      <a href="{{ route('likes', $post->id) }}" class="text-dark">
                        <i class="bi bi-hand-thumbs-up {{ $post->likes()->where('user_id', Auth::id())->exists() ? 'text-primary' : "text-dark" }}"></i>
                      </a>
                      <p>{{ $post->likes_count }}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        @endforeach
        
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