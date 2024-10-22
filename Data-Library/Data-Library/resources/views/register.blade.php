<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS only -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>RE - Register</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><img src="../images/relogo.png" alt="logo"></h1>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="departement" class="form-label">Departement</label>
                                            <select name="departement" id="departement" class="custom-select" required>
                                                <option value="" selected>Pilih Departement</option>
                                                <option value="Project Control">Project Control</option>
                                                <option value="Piping">Piping</option>
                                                <option value="Sipil">Sipil</option>
                                                <option value="Instrumen">Instrumen</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Proses">Proses</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 d-grid">
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <a href="{{ route('login') }}" class="text-gray-900 mb-4">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>