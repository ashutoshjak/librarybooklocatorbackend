<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> LibraryBookLoactor Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::to('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ URL::to('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::to('css/sb-admin.css') }}" rel="stylesheet">

    <script src="{{ URL::to('ckeditor/ckeditor.js') }}"></script>

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ URL::to('dashboard') }}"> LibraryBookLoactor Dashboard</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    {{-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Navbar -->
    <ul class="navbar-nav mr-auto ">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->user_name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="{{ URL::to('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Book</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                <a class="dropdown-item" href="{{ URL::to('create-book') }}"> Add Book</a>
                <a class="dropdown-item" href="{{ URL::to('all-books') }}"> All Books </a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Map</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                <a class="dropdown-item" href="{{ URL::to('create-map') }}"> Add Map</a>
                <a class="dropdown-item" href="{{ URL::to('all-maps') }}"> All Maps </a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>RequestBook</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                {{-- <a class="dropdown-item" href="{{ URL::to('get-requestbook-form') }}"> Create Product</a> --}}
                <a class="dropdown-item" href="{{ URL::to('all-requestbooks') }}"> All RequestBooks </a>

            </div>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>User</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                {{-- <a class="dropdown-item" href="{{ URL::to('get-requestbook-form') }}"> Create Product</a> --}}
                <a class="dropdown-item" href="{{ URL::to('all-users') }}"> All Users </a>

            </div>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Rule</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                <a class="dropdown-item" href="{{ URL::to('create-rule') }}"> Add Rule</a>
                <a class="dropdown-item" href="{{ URL::to('all-rules') }}"> All Rules </a>

            </div>
        </li>

         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Announcement</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                <a class="dropdown-item" href="{{ URL::to('create-update') }}"> Add Announcement</a>
                <a class="dropdown-item" href="{{ URL::to('all-updates') }}"> All Announcements </a>

            </div>
        </li>


    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            @yield('dashboard-content')



        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{ URL::to('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL::to('vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::to('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::to('js/sb-admin.min.js') }}"></script>

<!-- Demo scripts for this page-->
<script src="{{ URL::to('js/demo/datatables-demo.js') }}"></script>
<script src="{{ URL::to('js/demo/chart-area-demo.js') }}"></script>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script>
</body>

</html>
