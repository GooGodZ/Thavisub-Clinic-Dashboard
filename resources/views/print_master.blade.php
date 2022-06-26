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
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/semantic/css/semantic.min.css') }}">
</head>

<body style="font-size: 12px">

    <div class="container">
        @yield('print')
    </div>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery.priceformat.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/semantic/js/semantic.min.js') }}"></script>

    <!-- JS Script -->
    <script>
        $(document).ready(function() {
            window.onafterprint = window.close;
            window.print();
        });
    </script>

</body>

</html>
