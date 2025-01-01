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
                <div class="col-sm-12 col-md-6" id="right">
                    <h2 id="blogs">ss blogs</h2>
                    <h2 id="recent">New Password</h2>
                    <p>Enter Your New Password To Change Your Old Password.</p>
                </div>

                <div class="col-sm-12 col-md-6">
                    <form
                        action="{{ route('resetPasswordProcess') }}"
                        method="POST"
                    >
                        @csrf
                        <input  type="hidden" name="token" value="{{ $token }}">
                        <input
                            type="text"
                            placeholder="New Password"
                            id="input"
                            name="new_password"
                            class="form-control @error('email') is-invalid @enderror"
                        />
                        <input
                            type="password"
                            placeholder="Password Confirmation"
                            name="new_password_confirmation"
                            class="mt-2 form-control @error('password') is-invalid @enderror"
                            id="input"
                        />
                        <input
                            type="submit"
                            value="Submit"
                            id="submit"
                            class="mt-4"
                        />
                        <a href="{{ route('login') }}"><p class="mt-2">Log in ?</p></a>
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
