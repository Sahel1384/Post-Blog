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
                            action="{{  route('commentProcess', $post->id) }}"
                            method="POST"
                            id="profile-form"
                        >
                            @csrf
                           <textarea name="texteara" placeholder="Comment Here" class="w-75" id="texteara"></textarea>

                            <input
                                type="submit"
                                value="Submit"
                                id="submit"
                                class="mt-4"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="links/app.js"></script> --}}
        {{-- <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script> --}}
@endsection