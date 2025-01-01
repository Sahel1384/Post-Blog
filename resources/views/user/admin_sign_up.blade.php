<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign Up Page</title>

        <!-- bootstrap link start -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <!-- bootstrap link end -->

        <!-- bootstrap icons start -->
        <link
            rel="stylesheet"
            href="links/bootstrap-icons/bootstrap-icons.css"
        />
        <link rel="stylesheet" href="links/boxicons/css/boxicons.css" />
        <!-- bootstrap icons end -->

        <!-- custom css start -->
        <link rel="stylesheet" href="links/css links/sign_up.css" />
        <!-- custom css end -->

        <!-- responsive page css start -->
        <link rel="stylesheet" href="links/css links/sign_up_responsive.css" />
        <!-- responsive page css end -->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <form
                        action="{{ route('add_admin') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div id="heading">
                            <div>
                                <h2>Sign Up</h2>
                            </div>
                            <div>
                                <span class="bi bi-three-dots-vertical"></span>
                            </div>
                        </div>
                        <hr />
                        <div id="body">
                            <div id="first">
                                <input
                                    type="text"
                                    name="name"
                                    id="input"
                                    placeholder="Full Name"
                                    value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                />
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control mt-2 @error('email') is-invalid @enderror"
                                    id="input"
                                    value="{{ old('email') }}"
                                    placeholder="Email"
                                />
                                <input
                                    type="date"
                                    name="db"
                                    value="{{ old('db') }}"
                                    class="form-control mt-2 @error('db') is-invalid @enderror"
                                    id="input"
                                    placeholder="Date"
                                />
                            </div>
                            <div id="second">
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="input"
                                    placeholder="Password"
                                />
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control mt-2 @error('password_confirmation') is-invalid @enderror"
                                    id="input"
                                    placeholder="Password Confirmation"
                                />
                                <div class="mt-3">
                                    <label for="">Male</label>
                                    <input type="radio" name="check" id="radio" value="Male" />
                                    <label for="">Female</label>
                                    <input type="radio" name="check" id="radio" value="Female" />
                                    <label for="">Others</label>
                                    <input type="radio" name="check" id="radio" value="Others" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <input value="{{ old('image') }}" name="image" type="file" class="form-control @error('image') is-invalid @enderror" />
                        </div>
                        @if (Auth::user()->user_role == 'admin')
                        <div class="mt-3">
                            <select name="user_role" id="" class="form-select @error('user_role') is-invalid @enderror">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        @endif
                        <div class="mt-3 text-center">
                            <input type="submit" value="Sign Up" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
