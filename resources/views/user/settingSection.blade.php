@extends('layout.index')
@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>


    <!-- custom css start -->
    <link rel="stylesheet" href="{{ asset('links/css links/home.css') }}" />
    <!-- custom css end -->

    <!-- responsive page css start -->
    <link rel="stylesheet" href="{{ asset('links/css links/home_responsive.css') }}" />
    <!-- responsive page css end -->
  </head>
  <body>


    <div class="container mt-5">
      <div class="row gy-3">
        <h5>Admin Info</h5>
        <div class="col-md-4">
            <div class="totalPost">
                <div>
                    <i class="fa fa-money-check"></i>
                </div>
                <div>
                    <h5>Total Posts</h5>
                      # {{ $postCount }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="totalPost">
              <div>
                  <i class="fa fa-cable-car"></i>
              </div>
              <div class="likes">
                  <h5>Total Likes</h5>
                    # {{ $likeCount }}
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="totalPost">
              <div>
                  <i class="fa fa-object-group"></i>
              </div>
              <div class="views">
                  <h5>Total Views</h5>
                    # {{ $viewCount }}
              </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="" id="ad-post1">
          <h5 class="">Your Posts</h5>
          <button type="button" class="btn"><a href="{{ route('post.index') }}" class="nav-link">Add Post</a></button>
        </div>
      </div>

      <div class="row" id="admin-post">
       <div class="table table-responsive">
           <table class="table table-bordered table-striped table-hover text-center">
             <tr>
                 <th>Title</th>
                 <th>Published Date</th>
                 <th>Category</th>
                 <th>Views</th>
                 <th>Likes</th>
                 <th>Comments</th>
                 <th>Shares</th>
             </tr>
             @foreach ($user as $val)
               <tr>
                 <td>{{ $val->title }}</td>
                 <td>{{ $val->date }}</td>
                 
                 <td>
                   {{ $val->category }}
                 </td>
                 
                 <td>{{ $val->views_count }}</td>
                 <td>{{ $val->likes_count }}</td>
                 <td>{{ $val->comments_count }}</td>
                 <td>{{ $val->shares_count }}</td>
               </tr>
             @endforeach
             </table>
             <div id="pagination">
                 {{ $user->links('pagination::bootstrap-5 ') }}
             </div>
         </div>
      </div>
    </div>

      @if (Auth::user()->user_role == 'admin')
      <div class="container" id="admin-part">
        <div class="row" id="adm-btn">
          <div class="col-md-12 d-flex justify-content-between mb-2 mb-sm-1 mt-sm-3">
            <h5>Admins</h5>
            <button type="button" class="btn"><a href="{{ route('admin_sign_up') }}" class="nav-link">Add Admin</a></button>
          </div>
        </div>

        <div class="row" id="admin-div">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped text-center" id="admin-table">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Photo</th>
                  <th>Role</th>
                  <th>Posts</th>
                
                </tr>
                @foreach ($allAdminsInfo as $val)
                  <tr>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->gender }}</td>
                    <td>
                      <img src="{{ '/storage/' . $val->image }}" alt="">
                    </td>
                    <td>{{ $val->user_role }}</td>
                    <td>{{ $val->posts_count }}</td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>

        <div class="row gy-3 mt-5" id="user-div">
          <h5>Users Info</h5>
          <div class="col-md-4">
              <div class="totalPost">
                  <div>
                      <i class="bi bi-people" id="bi-people"></i>
                  </div>
                  <div>
                      <h5>Total Users</h5>
                      # {{ $allUsers }}
                  </div>
              </div>
          </div>
          <div class="col-md-4">
            <div class="totalPost">
                <div>
                    <i class="fa fa-sack-dollar"></i>
                </div>
                <div class="likes">
                  <h5>Total Users Posts</h5>
                  # {{ $allPosts }}
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="totalPost">
                <div>
                    <i class="fa fa-object-group"></i>
                </div>
                <div class="views">
                  <h5>Total Categories</h5>
                  # {{ $allCategory }}
                </div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="" id="ad-us1">
            <h5 class="">Users</h5>
            <button type="button" class="btn"><a href="{{ route('sign_up') }}" class="nav-link">Add User</a></button>
          </div>
        </div>
        <div class="row mt-1" id="user-info">
           <div class="col-md-12">
            {{-- <h5>Users</h5> --}}
             <div class="table-responsive">
               <table class="table table-bordered table-hover table-striped  text-center">
                 <tr>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Gender</th>
                   <th>Photo</th>
                   <th>Role</th>
                   <th>Posts</th>
                 
                 </tr>
                 @foreach ($allUsersInfo as $val)
                   <tr>
                     <td>{{ $val->name }}</td>
                     <td>{{ $val->email }}</td>
                     <td>{{ $val->gender }}</td>
                     <td>
                      <img src="{{ '/storage/' . $val->image }}" alt="">
                     </td>
                     <td>{{ $val->user_role }}</td>
                     <td>{{ $val->posts_count }}</td>
                   </tr>
                 @endforeach
               </table>
             </div>
           </div>
        </div>
      </div>
      @endif

    {{-- admin dashboard section start --}}


    
    

    {{-- admin dashboard section end --}}


    <!-- body section start -->
        
    <!-- body section end -->

   
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
  </body>
</html>

@endsection