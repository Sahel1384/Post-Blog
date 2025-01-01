<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign In Page</title>

        <!-- bootstrap link start -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" />
        <!-- bootstrap link end -->

        <!-- bootstrap icons start -->
        <link
            rel="stylesheet"
            href="{{ asset('links/bootstrap-icons/bootstrap-icons.css') }}"
        />
        <link rel="stylesheet" href="{{ asset('links/boxicons/css/boxicons.css') }}" />
        <!-- bootstrap icons end -->

        <!-- custom css start -->
        <link rel="stylesheet" href="{{ asset('links/css links/sign_in.css') }}" />
        <!-- custom css end -->

        <!-- responsive page css start -->
        <link rel="stylesheet" href="{{ asset('links/css links/sign_in_responsive.css') }}" />
        <!-- responsive page css end -->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-2">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 offset-2">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-6" id="right">
                    <h2 id="blogs">ss blogs</h2>
                    <h2 id="recent">Forget Password</h2>
                    <p>Enter Your Email For Reset Password.</p>
                </div>

                <div class="col-sm-12 col-md-6">
                    <form
                        action="{{ route('forgetPasswordProcess') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <input
                            type="text"
                            placeholder="Email address"
                            id="input"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                        />
                        <input
                            type="submit"
                            value="Reset"
                            id="submit"
                            class="mt-4"
                        />
                        <a href="{{ route('loginPage') }}"><p class="mt-2">Log in</p></a>
                        <hr />
                            <button type="button" id="btn">
                                <a href="{{ route('sign_up') }}">Create new account </a>
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
