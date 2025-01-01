@extends('layout.index')
  @section('content')
<!-- custom css start -->
{{-- <link rel="stylesheet" href="{{ asset('links/css links/sign_in.css') }}" /> --}}
<!-- custom css end -->

<!-- responsive page css start -->
{{-- <link rel="stylesheet" href="{{ asset('links/css links/sign_in_responsive.css') }}" /> --}}
<!-- responsive page css end -->

        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                    <div class="col-sm-12 col-md-6">
                        <form
                            action="{{  route('user_sign_up.update', $user->id) }}"
                            method="POST" enctype="multipart/form-data" id="profile-form"
                        >
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                            @csrf
                            @method('PUT')
                            <input type="password" name="password" placeholder="Enter Your Password" class="form-control @error('password') is-invalid @enderror" id="input">
                            <hr>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" id="input">
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control  @error('email') is-invalid @enderror mt-2"  id="input">
                            <input type="date" name="db" value="{{ $user->db }}" class="form-control  @error('db') is-invalid @enderror mt-2"  id="input">

                            <input
                                type="submit"
                                value="Update"
                                id="submit"
                                class="mt-4"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection