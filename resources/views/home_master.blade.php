<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thavisub Clinic Dashboard</title>
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
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick-theme.css') }}">
</head>

<body>
    

    <!-- Main JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery-slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/js/aos.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/glightbox/js/glightbox.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.js') }}"></script>

    <!-- JS Script -->
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
</body>

</html>
