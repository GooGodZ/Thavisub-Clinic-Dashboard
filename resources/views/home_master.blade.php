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

    <section class="sidebar">
        <a href="{{ route('index') }}" class="logo-details">
            <img class="icons" src="{{ asset('assets/images/logo_icon.png') }}" alt="">
            <img class="logo" src="{{ asset('assets/images/logo_dashboard.png') }}" alt="">
        </a>
        <ul class="nav-links">
            <li>
                <a href="{{ route('index') }}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">ໜ້າຫຼັກ</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">ໜ້າຫຼັກ</a></li>
                </ul>
            </li>
            <li>
                <div class="category-menu">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">ລົງທະບຽນ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ລົງທະບຽນ</a></li>
                    <li><a href="{{ route('patients.index') }}">ຟອມຂໍ້ມູນຄົນເຈັບ</a></li>
                    <li><a href="{{ route('cases.index') }}">ຟອມລົງທະບຽນກວດ</a></li>
                </ul>
            </li>
            <li>
                <div class="category-menu">
                    <i class="fa-solid fa-hand-holding-medical"></i>
                    <span class="link_name">ບໍລິການ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ບໍລິການ</a></li>
                    <li><a href="">ຟອມຂໍ້ມູນການກວດ</a></li>
                    <li><a href="">ຟອມການວາງຢາ</a></li>
                    <li><a href="">ຟອມນັດກວດ</a></li>
                </ul>
            </li>
            <li>
                <div class="category-menu">
                    <i class='bx bx-money'></i>
                    <span class="link_name">ການເງິນ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ການເງິນ</a></li>
                    <li><a href="">ການຊຳລະເງິນ</a></li>
                </ul>
            </li>
            <li>
                <div class="category-menu">
                    <i class="fa-solid fa-user-doctor"></i>
                    <span class="link_name">ທ່ານໝໍ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ທ່ານໝໍ</a></li>
                    <li><a href="{{ route('doctors.index') }}">ຂໍ້ມູນທ່ານໝໍ</a></li>
                </ul>
            </li>
            <li>
                <div class="category-menu">
                    <i class='bx bx-package'></i>
                    <span class="link_name">ສາງ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ສາງ</a></li>
                    <li><a href="">ຂໍ້ມູນສິນຄ້າ</a></li>
                    <li><a href="">ຂໍ້ມູນປະເພດສິນຄ້າ</a></li>
                    <li><a href="">ຂໍ້ມູນການສັ່ງຊື່</a></li>
                </ul>
            </li>
            <li>
                <div class="category-menu">
                    <i class='bx bx-user-plus'></i>
                    <span class="link_name">ຜູ້ສະໝອງ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ຜູ້ສະໝອງ</a></li>
                    <li><a href="">ຂໍ້ມູນຜູ້ສະໜອງ</a></li>
                </ul>
            </li>
            <li>
                <div class="category-menu">
                    <i class='bx bxs-report'></i>
                    <span class="link_name">ລາຍງານ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ລາຍງານ</a></li>
                    <li><a href="">ລາຍງານຈຳນວນຄົນເຈັບ</a></li>
                    <li><a href="">ລາຍງານສະເໝີກວດ</a></li>
                    <li><a href="">ລາຍງານຜົນກວດ</a></li>
                    <li><a href="">ລາຍງານການນັດກວດ</a></li>
                    <li><a href="">ລາຍງານປະຫວັດການປິ່ນປົ່ວ</a></li>
                    <li><a href="">ລາຍງານຜູ້ສະໝອງ</a></li>
                    <li><a href="">ລາຍງານຈຳນວນສິນຄ້າ</a></li>
                    <li><a href="">ລາຍງານລາຍຈ່າຍ</a></li>
                    <li><a href="">ລາຍງານລາຍຮັບ</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <section class="home-section">
        <div class="home-content-top">
            <i class='bx bx-menu'></i>
        </div>
        <div class="home-content-body">
            @yield('contents')
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
    <script src="{{ asset('assets/vendors/slick/slick.js') }}"></script>

    <!-- JS Script -->
    <script>
        $(window).scroll(function() {
            if ($(window).scrollTop()) {
                $(".home-content-top").addClass("sticky");
            } else {
                $(".home-content-top").removeClass("sticky");
            }
        })

        $(document).ready(function() {
            $('#mytable').DataTable({
                responsive: true,
            });
        });

        const bar = document.getElementById('myBar');
        const myBar = new Chart(bar, {
            type: 'bar',
            data: {
                labels: ['ເດືອນ 1', 'ເດືອນ 2', 'ເດືອນ 3', 'ເດືອນ 4', 'ເດືອນ 5', 'ເດືອນ 6', ],
                datasets: [{
                    label: 'ຈຳນວນຄົນເຈັບ',
                    data: [12],
                    backgroundColor: [
                        '#059BFF',
                    ],
                    borderColor: [
                        '#059BFF',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const donut = document.getElementById('myDonut');
        const myDonut = new Chart(donut, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50],
                    backgroundColor: [
                        '#FF6384',
                        '#059BFF',
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>
</body>

</html>
