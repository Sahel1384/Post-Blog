@extends('layout.index')
  @section('content')
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <form action="{{ route('post_form.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row" id="form">
                <h4>Update Post</h4>

                <div class="col-md-6">
                    <label for="" class="">Post Title</label>
                    <input
                        type="text"
                        placeholder="Post Title"
                        class="form-control"
                        name="title"
                        value="{{ $post->title }}"
                    />
                    <label for="" class="">Post Discription</label>

                    <input
                        type="text"
                        placeholder="Post Discription"
                        class="form-control"
                        name="discription"
                        value="{{ $post->discription }}"
                    />
                    <label for="" class="">Post Date</label>

                    <input
                        type="date"
                        placeholder="Post Discription"
                        class="form-control"
                        id="input"
                        name="date"
                        value="{{ $post->date }}"
                    />
                </div>
                <div class="col-md-6">
                    <label for="" class="">Post Category</label>

                    <select name="category" id="select" class="form-select">
                        @foreach ($postCategory as $val)
                            <option value="{{ $val->id }}" {{ $post->category == $val->category ? 'selected' : "" }} >{{ $val->category }}</option>
                        @endforeach
                    </select>
                    <label for="" class="">Post State</label>

                    <select name="state" id="select" class="form-select">
                        @if ($post->state === 'Publish')
                        <option value="Publish">{{ $post->state }}</option> 
                        <option value="Draft">Draft</option> 
                        @else
                        <option value="Draft">{{ $post->state }}</option> 
                        <option value="Publish">Publish</option> 
                        @endif
                    </select>
                    <label for="" class="">Post Image</label>

                    <img id="photo" src="{{ '/storage/' . $post->image }}" width="80px" height="80px" alt="">
                    <input
                        type="file"
                        placeholder="Upload Image"
                        class="form-control"
                        name="image"
                        onchange="document.querySelector('#photo').src=window.URL.createObjectURL(this.files[0])"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="btn-div">
                    <input type="submit" id="publish" value="Update">
                </div>
            </div>
        </form>
    </div>
</body>
  @endsection

