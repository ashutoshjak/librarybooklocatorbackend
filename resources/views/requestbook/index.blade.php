@extends('layout')
@section('dashboard-content')

    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('delete-failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All RequestBook </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> RequestBook Book Name </th>
                        <th> RequestBook Author Name </th>
                        <th> RequestBook Publication </th>
                        <th> RequestBook Edition </th>
                        <th> User Id</th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th> RequestBook Book Name </th>
                        <th> RequestBook Author Name </th>
                        <th> RequestBook Publication </th>
                        <th> RequestBook Edition </th>
                        <th> User Id</th>
                        <th>Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($requestbooks as $requestbook)

                        <tr>
                            <td> {{ $requestbook->book_name }} </td>
                            <td> {{ $requestbook->author_name }} </td>
                            <td> {{ $requestbook->book_publication }} </td>
                            <td> {{ $requestbook->book_edition }} </td>
                            <td> {{ $requestbook->user_id}} </td>
                            {{-- <td> <img src="{{ $requestbook->icon }}" width="100" height="100"></td> --}}
                            <td>
                                {{-- <a href="{{ URL::to('edit-requestbook') }}/{{ $requestbook->id }}" class="btn btn-outline-primary btn-sm"> Edit </a> --}}
                                {{-- <a href="{{ URL::to('soft-delete-requestbook') }}/{{ $requestbook->id }}" class="btn btn-outline-warning btn-sm" onclick="checkDelete()">Soft Delete </a>
                                <hr> --}}
                                <a href="{{ URL::to('delete-requestbook') }}/{{ $requestbook->id }}" class="btn btn-outline-warning btn-sm" onclick="checkDelete()">Soft Delete </a>
                                <hr>
                                 <a href="{{ URL::to('force-delete-requestbook') }}/{{ $requestbook->id }}" class="btn btn-outline-danger btn-sm" onclick="checkDelete()">Force Delete </a>

                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <script>
        function checkDelete() {
            var check = confirm('Are you sure you want to Delete this?');
            if(check){
                return true;
            }
            return false;
        }
    </script>

@stop
