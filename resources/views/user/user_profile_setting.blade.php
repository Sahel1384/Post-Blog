@extends('layout.index')
  @section('content')
        
  {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" /> --}}
  <!-- custom css start -->
  {{-- <link rel="stylesheet" href="{{ asset('links/css links/home.css') }}" /> --}}
  <!-- custom css end -->

  <!-- responsive page css start -->
  {{-- <link rel="stylesheet" href="{{ asset('links/css links/home_responsive.css') }}" /> --}}
  <!-- responsive page css end -->
<!-- custom css start -->
{{-- <link rel="stylesheet" href="{{ asset('links/css links/sign_in.css') }}" /> --}}
<!-- custom css end -->

<!-- responsive page css start -->
{{-- <link rel="stylesheet" href="{{ asset('links/css links/sign_in_responsive.css') }}" /> --}}
<!-- responsive page css end -->


        <div class="container mt-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                    <div class="col-sm-12 col-md-6">
                        <form action="{{ route('profileSettingProcess', $user->id) }}" method="POST" enctype="multipart/form-data" id="profile-form">
                            @csrf
                            @method('PUT')
                            <img src="{{ '/storage/'. $user->image }}" class="w-75" id="photo" alt="">
                            <input id="input" type="password" name="password" placeholder="Password" class="form-control w-75 mt-3 @error('password') is-invalid @enderror">
                            {{-- <hr> --}}
                            <input type="file" name="photo" class="form-control w-75 mt-3" onchange="document.querySelector('#photo').src=window.URL.createObjectURL(this.files[0])">
                            <input
                                type="submit"
                                value="Change"
                                id="submit"
                                class="mt-4"
                            />
                        </form>  
                    </div>
                </div>
            </div>
        </div>

        <script src="bootstrap/js/bootstrap.bundle.js"></script>
@endsection