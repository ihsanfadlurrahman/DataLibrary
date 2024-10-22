<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Petugas</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    @yield('css')

    <style>
        .btn-purple{
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
        }
        .btn-purple:hover{
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="../images/Picture1.png" alt="RE Logo">
                {{-- <h3 class="mb-0">RE</h3>
                <p class="text-white mb-0">Data</p> --}}
            </div>
            
            <ul class="list-unstyled components">
                <li class="">
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                @if(Auth::user()->departement === 'Admin')
                    <hr class="sidebar-divider my-0">
                    <li class="">
                        <a href="{{ route('karyawan.index') }}">Data Karyawan</a>
                    </li>
                @endif
                <hr class="sidebar-divider my-0">
                <li class="">
                    <a href="{{ route('pemasukan.index') }}">Pemasukan Dokumen</a>
                </li>
                {{-- <hr class="sidebar-divider my-0">
                <li class="">
                    <a href="{{ route('pengeluaran.index') }}">Data Pengeluaran</a>
                </li> --}}
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="ml-2">@yield('header')</div>

                    <div class="dropdown">
                        <button class="btn btn-primary" type="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>                    
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    @yield('js')
    </body>
</html>