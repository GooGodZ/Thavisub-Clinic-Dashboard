<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ຄລິນິກທະວີຊັບ</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/boxsicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/glightbox/css/glightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/semantic/css/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick-theme.css') }}">
</head>

<body>

    <section class="vh-100 bg-secondary">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-5">
                    <div class="card bg-white border-0 p-4" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid mb-4"
                                width="150px">
                            <h3 class="text-secondary mb-4">ເຂົ້າສູ່ລະບົບຄລິນິກທະວິຊັບ</h3>
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="email" class="form-control" name="email" placeholder="ອີເມວ">
                                    @error('failed')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="ລະຫັດຜ່ານ">
                                    @error('failed')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <button class="btn btn-outline-info btn-lg px-5" type="submit">ເຂົ້າສູ່ລະບົບ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery-slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/js/aos.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/glightbox/js/glightbox.js') }}"></script>
    <script src="{{ asset('assets/vendors/semantic/js/semantic.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.js') }}"></script>

</body>

</html>
