@extends('layout.index')
  @section('content')
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Post Form Page</title>

     <!-- bootstrap link start -->
     {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" /> --}}
     <!-- bootstrap link end -->

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
</head>
<body>
    <div class="container">
        <form action="{{ route('post_form.store') }}" method="POST" enctype="multipart/form-data" id="profile-form1 ">
            @csrf
            <div class="row" id="form">
                <h4>Add Post</h4>

                <div class="col-md-6">
                    <label for="" class="">Post Title</label>
                    <input
                        type="text"
                        placeholder="Post Title"
                        class="form-control"
                        name="title"
                    />
                    <label for="" class="">Post Discription</label>

                    <input
                        type="text"
                        placeholder="Post Discription"
                        class="form-control"
                        name="discription"
                    />
                    <label for="" class="">Post Date</label>

                    <input
                        type="date"
                        placeholder="Post Discription"
                        class="form-control"
                        id="input"
                        name="date"
                    />
                </div>
                <div class="col-md-6">
                    <label for="" class="">Post Category</label>

                    <select name="category" id="select" class="form-select">
                        @foreach ($postCategory as $val)
                            <option value="{{ $val->id }}">{{ $val->category }}</option>
                        @endforeach
                    </select>
                    <label for="" class="">Post State</label>

                    <select name="state" id="select" class="form-select">
                        <option value="Publish">Publish</option>
                        <option value="Draft">Draft</option>
                    </select>
                    <label for="" class="">Post Image</label>

                    <input
                        type="file"
                        placeholder="Upload Image"
                        class="form-control"
                        name="image"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="btn-div">
                    <input type="submit" id="publish" value="Insert">
                </div>
            </div>
        </form>
    </div>
</body>
  @endsection

