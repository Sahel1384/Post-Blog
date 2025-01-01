@extends('layout.index')
@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Post Page</title>

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
      <div class="d-flex justify-content-between mb-2">
        <div id="post-div">
          <h3>Draft Posts</h3>
        </div>
        <div id="filter">
          <div class="d-flex justify-content-around" id="filter-btn">
            <button type="button">Filteration</button><span class="bi bi-chevron-right"></span>
          </div>
          <div class="filter-menu">
            <a href="{{ route('myPost') }}" class="">All Posts</a>
            <a href="{{ route('publishPost') }}" class="">Published Posts</a>
            <a href="{{ route('draftPost') }}" class="">Draft Posts</a>
          </div>
         </div>
      </div>
      <div class="row gy-3">
        <div class="table table-responsive" id="post-table">
            <table class="table table-bordered table-striped table-hover text-center">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Published Date</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->date }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->state }}</td>
                        <td>
                          <img src="{{ '/storage/' . $post->image }}" id="post-img" alt="">
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('post_form.edit', $post->id) }}" class=" text-warning"><span class="bi bi-pencil-square"></span></a>
                            <a href="" class="text-danger ms-3"><span class="bi bi-trash"></span></a>
                        </td>
                        
                    </tr>
                @endforeach
            </table>
            <div id="pagination">
                {{ $posts->links('pagination::bootstrap-5 ') }}
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