@extends('layout.index')
@section('content')

    <!-- custom css start -->
    <link
        rel="stylesheet"
        href="{{ asset('links/css links/post_form.css') }}"
    />
    <!-- custom css end -->

    <!-- responsive page css start -->
    <link
        rel="stylesheet"
        href="{{ asset('links/css links/post_form_responsive.css') }}"
    />
    <!-- responsive page css end -->
    <div class="container">
        <form action="{{ route('post_form.store') }}" method="POST" enctype="multipart/form-data" id="profile-form1 ">
            @csrf
            
            <div class="row" id="form">
                <h5>Change Layout</h5>
                <div class="col-md-6">
                    <label for="" class="">Navbar & Sidebar Bg-Color</label>
                    <select name="category" id="select" class="form-select">
                        <option value="Black">Black</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                    </select>

                    <label for="" class="">Navbar & Sidebar Color</label>
                    <select name="category" id="select" class="form-select">
                        <option value="Black">Black</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                    </select>

                    <label for="" class="">Body Bg-color</label>
                    <select name="category" id="select" class="form-select">
                        <option value="Black">Black</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                    </select>
                </div>
                <div class="col-md-6">
                    
                    
                    <label for="" class="">Button Bg-Color</label>
                    <select name="state" id="select" class="form-select">
                        <option value="Black">Black</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                    </select>

                    {{-- <label for="" class="">Navbar Icons</label><br> --}}
                    <label for="show">Show</label>
                    {{-- <input type="radio" class="" id="show" class="form-selct"> --}}
                    
                    <label for="hidden">Hidden</label>
                    {{-- <input type="radio" class="" id="hidden"> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="btn-div">
                    <input type="submit" id="publish" value="Change">
                </div>
            </div>
        </form>
    </div>
  @endsection

