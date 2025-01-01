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
                            action="{{  route('passwordSettingProcess', Auth::id()) }}"
                            method="POST"
                            id="profile-form"
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
                            <input type="text" placeholder="Current Password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="input">
                            {{-- <hr> --}}
                            <input type="text" placeholder="New Password" name="new_password" class="form-control  @error('new_password') is-invalid @enderror mt-2"  id="input">
                            <input type="text" placeholder="Password Confirmation" name="new_password_confirmation" class="form-control  @error('new_password_confirmation') is-invalid @enderror mt-2"  id="input">

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

@endsection