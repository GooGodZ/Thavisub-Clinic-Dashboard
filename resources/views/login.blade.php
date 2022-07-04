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
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/boxsicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
</head>

<body>
    <section class="vh-100 bg-secondary">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-5">
                    <div class="card bg-white border-0 p-3" style="border-radius: 1rem;">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid mb-3"
                                width="125px">
                            <h4 class="text-secondary mb-3">ເຂົ້າສູ່ລະບົບຄລິນິກທະວິຊັບ</h4>
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div class="form-outline mb-3  text-start">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        placeholder="ອີເມວ">
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3  text-start">
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                        placeholder="ລະຫັດຜ່ານ">
                                    @error('password')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <button class="btn btn-lg px-5 text-white" type="submit"
                                    style="background-color: #28635a; color: white">ເຂົ້າສູ່ລະບົບ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>

    @if (Session::has('failed'))
        <script>
            swal({
                icon: "error",
                title: "ຄຳເຕືອນ",
                text: "{{ session('failed') }}",
                button: "ຕົກລົງ",
                dangerMode: true,
            })
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            swal({
                icon: "success",
                title: "ຄຳເຕືອນ",
                text: "{{ session('success') }}",
                button: "ຕົກລົງ",
            })
        </script>
    @endif
</body>

</html>
