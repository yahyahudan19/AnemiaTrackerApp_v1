<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Login | AnemiaTrackerApp v1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="AnemiaTrackerApp" name="description" />
    <meta content="Yahya Hudan" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('template/dashboard/vertical/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('template/dashboard/vertical/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/dashboard/vertical/assets/css/theme.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>
 
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="#" class="text-dark font-size-22 font-family-secondary">
                                                <i class="mdi mdi-alpha-x-circle"></i> <b>SI MANJA</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Halo, Selamat Datang Kembali !</h1>
                                        <p class="text-muted mb-4">Masukkan Username dan Password untuk mengakses Halaman Dashboard !</p>

                                        <form class="user" method="POST" action="{{ route('auth') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="username" class="form-control form-control-user" id="username" name="username" placeholder="username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            </div>
                                            {{-- <a href="/dashboard" class="btn btn-success btn-block waves-effect waves-light"> Log In </a> --}}
                                            <button class="btn btn-success btn-block waver-effect wavers-light" type="submit"> Log In</button>
                                            
                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-2"><a href="#" class="text-muted font-weight-medium ml-1">Forgot your password?</a></p>
                                                <p class="text-muted mb-0">Don't have an account? <a href="/register" class="text-muted font-weight-medium ml-1"><b>Sign Up</b></a></p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="{{asset('template/dashboard/vertical/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/assets/js/metismenu.min.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/assets/js/waves.js')}}"></script>
    <script src="{{asset('template/dashboard/vertical/assets/js/simplebar.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('template/dashboard/vertical/assets/js/theme.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '{{ $errors->first() }}',
        });
    </script>
    @endif

</body>

</html>