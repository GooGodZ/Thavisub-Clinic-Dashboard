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

    @php
        $permission = session()->get('status');
    @endphp

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
            @if ($permission === 1 || $permission === 2)
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
                        <li><a href="{{ route('evaluations.index') }}">ຟອມຂໍ້ມູນຜົນກວດ</a></li>
                        <li><a href="{{ route('medicates.index') }}">ຟອມການວາງຢາ</a></li>
                        <li><a href="{{ route('appointments.index') }}">ຟອມນັດກວດ</a></li>
                    </ul>
                </li>
            @endif
            <li>
                <div class="category-menu">
                    <i class='bx bx-money'></i>
                    <span class="link_name">ການເງິນ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ການເງິນ</a></li>
                    <li><a href="{{ route('payments.index') }}">ການຊຳລະເງິນ</a></li>
                </ul>
            </li>
            @if ($permission === 1 || $permission === 3)
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
            @endif
            <li>
                <div class="category-menu">
                    <i class='bx bx-package'></i>
                    <span class="link_name">ສາງ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ສາງ</a></li>
                    @if ($permission === 1 || $permission === 2 || $permission === 3)
                        <li><a href="{{ route('products.index') }}">ຂໍ້ມູນສິນຄ້າ</a></li>
                    @endif
                    @if ($permission === 1 || $permission === 3)
                        <li><a href="{{ route('orders.index') }}">ຂໍ້ມູນການສັ່ງຊື່</a></li>
                    @endif
                </ul>
            </li>
            @if ($permission === 1 || $permission === 3)
                <li>
                    <div class="category-menu">
                        <i class='bx bx-user-plus'></i>
                        <span class="link_name">ຜູ້ສະໝອງ</span>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">ຜູ້ສະໝອງ</a></li>
                        <li><a href="{{ route('suppliers.index') }}">ຂໍ້ມູນຜູ້ສະໜອງ</a></li>
                    </ul>
                </li>
            @endif
            <li>
                <div class="category-menu">
                    <i class='bx bxs-report'></i>
                    <span class="link_name">ລາຍງານ</span>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">ລາຍງານ</a></li>
                    @if ($permission === 1 || $permission === 3)
                        <li><a href="{{ route('reportPatient') }}">ລາຍງານຈຳນວນຄົນເຈັບ</a></li>
                    @endif
                    @if ($permission === 1 || $permission === 2)
                        <li><a href="{{ route('reportCase') }}">ລາຍງານສະເໝີກວດ</a></li>
                        <li><a href="{{ route('reportEvaluation') }}">ລາຍງານຜົນກວດ</a></li>
                        <li><a href="{{ route('reportAppointment') }}">ລາຍງານການນັດກວດ</a></li>
                        <li><a href="{{ route('reportTreatment') }}">ລາຍງານປະຫວັດການປິ່ນປົ່ວ</a></li>
                    @endif
                    @if ($permission === 1 || $permission === 3)
                        <li><a href="{{ route('reportSupplier') }}">ລາຍງານຜູ້ສະໝອງ</a></li>
                        <li><a href="{{ route('reportProduct') }}">ລາຍງານຈຳນວນສິນຄ້າ</a></li>
                        <li><a href="{{ route('reportExpense') }}">ລາຍງານລາຍຈ່າຍ</a></li>
                        <li><a href="{{ route('reportIncome') }}">ລາຍງານລາຍຮັບ</a></li>
                    @endif
                </ul>
            </li>
            @if ($permission === 1)
                <li>
                    <div class="category-menu">
                        <i class="fa-solid fa-gear"></i>
                        <span class="link_name">ຕັ້ງຄ່າ</span>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">ຕັ້ງຄ່າ</a></li>
                        <li><a href="{{ route('evaluation_types.index') }}">ປະເພດຜົນກວດ</a></li>
                        <li><a href="{{ route('product_types.index') }}">ປະເພດສິນຄ້າ</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <section class="home-section">
        <div class="home-content-top">
            <i class='bx bx-menu'></i>
            <div class="dropdown" style="margin-right:1rem">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>&nbsp;{{ session()->get('name') }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @if (session()->get('status') == 1)
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalFormRegister">ລົງທະບຽນ</a></li>
                    @endif
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#ModalFormChangePassword">ປ່ຽນລະຫັດຜ່ານ</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">ອອກຈາກລະບົບ</a></li>
                </ul>
                <div class="modal fade" id="ModalFormRegister" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">ລົງທະບຽນຜູ້ໃຊ້ງານ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>ຊື່ຜຸ້ໃຊ້ງານ</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="ປ້ອນຊື່ຜຸ້ໃຊ້ງານ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Password">ລະຫັດຜ່ານ</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="ປ້ອນລະຫັດຜ່ານ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Password">ອີເມວ</label>
                                        <input type="email" name="email" class="form-control" placeholder="ປ້ອນອີເມວ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Password">ສະຖານະ</label>
                                        <select name="status" class="form-select search">
                                            <option selected>ເລືອກສະຖານະ</option>
                                            <option value="2">ທ່ານໝໍ</option>
                                            <option value="3">ຜູ້ບໍລິຫານ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer pt-4">
                                    <button type="submit" class="btn btn-success mx-auto w-25">ລົງທະບຽນ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalFormChangePassword" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('changepassword') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">ປ່ຽນລະຫັດຜ່ານ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" name="user_id" class="form-control"
                                            value="{{ session()->get('id') }}">
                                        <label for="Password">ລະຫັດຜ່ານໃໝ່</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="ປ້ອນລະຫັດຜ່ານ">
                                    </div>
                                </div>
                                <div class="modal-footer pt-4">
                                    <button type="submit" class="btn btn-success mx-auto w-25">ລົງທະບຽນ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="{{ asset('assets/vendors/semantic/js/semantic.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.js') }}"></script>

    <!-- JS Script -->
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                responsive: true,
                ordering: false
            });
            $('#mytable2').DataTable({
                responsive: true,
                ordering: false
            });
            $('.search').dropdown();
        });
    </script>

    @yield('script')

</body>

</html>
