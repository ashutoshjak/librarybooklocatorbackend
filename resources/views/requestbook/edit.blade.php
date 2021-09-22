@extends('layout')
@section('dashboard-content')
    <h1> Update requestbook form</h1>

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('update-requestbook') }}/{{ $requestbook->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Book Name</label>
            <input type="text" class="form-control" value="{{ $requestbook->book_name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter book name" name="book_name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Author Name</label>
            <input type="text" class="form-control" value="{{ $requestbook->author_name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter book name" name="author_name">
        </div>

        {{-- <div class="form-group">
            <label for="exampleInputEmail1"> requestbook Icon </label>
            <input type="file" class="form-control" name="requestbookIcon" onchange="loadPhoto(event)">
        </div>

        <div>
            <img id="photo" height="100" width="100">
        </div> --}}

        <button type="submit" class="btn btn-primary"> Update </button>
    </form>
    {{-- <script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script> --}}
@stop
