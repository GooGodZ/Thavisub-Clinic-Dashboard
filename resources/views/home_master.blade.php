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
    <link rel="stylesheet" href="{{ asset('assets/vendors/adminLTE/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/boxsicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    @php
        $permission = session()->get('status');
    @endphp

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>&nbsp;{{ session()->get('name') }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal"
                            data-target="#ModalFormRegister">ລົງທະບຽນ</a>
                        <a class="dropdown-item" href="#" data-toggle="modal"
                            data-target="#ModalFormChangePassword">ປ່ຽນລະຫັດຜ່ານ</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">ອອກຈາກລະບົບ</a>
                    </div>
                </div>
            </ul>
        </nav>

        <div class="modal fade" id="ModalFormRegister" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">ລົງທະບຽນຜູ້ໃຊ້ງານ</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>ຊື່ຜຸ້ໃຊ້ງານ</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="ປ້ອນຊື່ຜຸ້ໃຊ້ງານ">
                            </div>
                            <div class="mb-3">
                                <label for="Password">ລະຫັດຜ່ານ</label>
                                <input type="password" name="password" class="form-control" placeholder="ປ້ອນລະຫັດຜ່ານ">
                            </div>
                            <div class="mb-3">
                                <label for="Password">ອີເມວ</label>
                                <input type="email" name="email" class="form-control" placeholder="ປ້ອນອີເມວ">
                            </div>
                            <div class="mb-3">
                                <label for="Password">ສະຖານະ</label>
                                <select name="status" class="form-select">
                                    <option value="">ເລືອກສະຖານະ</option>
                                    <option value="2">ທ່ານໝໍ</option>
                                    <option value="3">ຜູ້ບໍລິຫານ</option>
                                </select>
                                @error('status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
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
                            <button type="button" class="btn-close" data-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="hidden" name="user_id" class="form-control"
                                    value="{{ session()->get('id') }}">
                                <label for="Password">ລະຫັດຜ່ານເກົ່າ</label>
                                <input type="password" name="oldpassword" class="form-control"
                                    placeholder="ປ້ອນລະຫັດຜ່ານເກົ່າ">
                            </div>
                            <div class="mb-3">
                                <label for="Password">ລະຫັດຜ່ານໃໝ່</label>
                                <input type="password" name="newpassword" class="form-control"
                                    placeholder="ປ້ອນລະຫັດຜ່ານໃໝ່">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success mx-auto w-25">ບັນທືກ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <aside class="main-sidebar sidebar-light-primary elevation-2">
            <a href="{{ route('index') }}" class="brand-link">
                <img src="{{ asset('assets/images/logo_dashboard.png') }}" alt="Thavisub Logo"
                    style="opacity: .8;" height="60">
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="true">
                        <li class="nav-item">
                            <a href="{{ route('index') }}"
                                class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>ໜ້າຫຼັກ</p>
                            </a>
                        </li>
                        @if ($permission === 1 || $permission === 2)
                            <li
                                class="nav-item {{ request()->is('patients*') || request()->is('cases*') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->is('patients*') || request()->is('cases*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-book-medical"></i>
                                    <p>ລົງທະບຽນ<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('patients.index') }}"
                                            class="nav-link {{ request()->is('patients*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຟອມຂໍ້ມູນຄົນເຈັບ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cases.index') }}"
                                            class="nav-link {{ request()->is('cases*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຟອມລົງທະບຽນກວດ</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li
                                class="nav-item {{ request()->is('evaluations*') || request()->is('medicates*') || request()->is('appointments*') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->is('evaluations*') || request()->is('medicates*') || request()->is('appointments*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-hand-holding-medical"></i>
                                    <p>ບໍລິການ<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('evaluations.index') }}"
                                            class="nav-link {{ request()->is('evaluations*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຟອມຂໍ້ມູນຜົນກວດ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('medicates.index') }}"
                                            class="nav-link {{ request()->is('medicates*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຟອມການວາງຢາ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('appointments.index') }}"
                                            class="nav-link {{ request()->is('appointments*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຟອມນັດກວດ</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item {{ request()->is('payments*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('payments*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>ການເງິນ<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('payments.index') }}"
                                        class="nav-link {{ request()->is('payments*') ? 'active' : '' }}">
                                        <p style="margin-left: 32.5px;">ການຊຳລະເງິນ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->is('products*') || request()->is('orders*') || request()->is('buys*') || request()->is('order_details*') || request()->is('buy_details*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('products*') || request()->is('orders*') || request()->is('buys*') || request()->is('order_details*') || request()->is('buy_details*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>ສາງ<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}"
                                        class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                                        <p style="margin-left: 32.5px;">ຂໍ້ມູນສິນຄ້າ</p>
                                    </a>
                                </li>
                                @if ($permission === 1 || $permission === 3)
                                    <li class="nav-item">
                                        <a href="{{ route('orders.index') }}"
                                            class="nav-link {{ request()->is('orders*') || request()->is('buys*') || request()->is('order_details*') || request()->is('buy_details*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຂໍ້ມູນການສັ່ງຊື້</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li
                            class="nav-item {{ request()->is('reportpatient*') || request()->is('reportcase*') || request()->is('reportevaluation*') || request()->is('reportappointment*') || request()->is('reporttreatment*') || request()->is('reportsupplier*') || request()->is('reportproduct*') || request()->is('reportexpense*') || request()->is('reportincome*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('reportpatient*') || request()->is('reportcase*') || request()->is('reportevaluation*') || request()->is('reportappointment*') || request()->is('reporttreatment*') || request()->is('reportsupplier*') || request()->is('reportproduct*') || request()->is('reportexpense*') || request()->is('reportincome*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>ລາຍງານ<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if ($permission === 1 || $permission === 3)
                                    <li class="nav-item">
                                        <a href="{{ route('reportPatient') }}"
                                            class="nav-link {{ request()->is('reportpatient*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານຈຳນວນຄົນເຈັບ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('reportCase') }}"
                                            class="nav-link {{ request()->is('reportcase*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານສະເໝີກວດ</p>
                                        </a>
                                    </li>
                                @endif
                                @if ($permission === 1 || $permission === 2)
                                    <li class="nav-item">
                                        <a href="{{ route('reportEvaluation') }}"
                                            class="nav-link {{ request()->is('reportevaluation*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານຜົນກວດ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('reportAppointment') }}"
                                            class="nav-link {{ request()->is('reportappointment*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານການນັດກວດ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('reportTreatment') }}"
                                            class="nav-link {{ request()->is('reporttreatment*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານປະຫວັດການປິ່ນປົ່ວ</p>
                                        </a>
                                    </li>
                                @endif
                                @if ($permission === 1 || $permission === 3)
                                    <li class="nav-item">
                                        <a href="{{ route('reportSupplier') }}"
                                            class="nav-link {{ request()->is('reportsupplier*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານຜູ້ສະໝອງ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('reportProduct') }}"
                                            class="nav-link {{ request()->is('reportproduct*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານຈຳນວນສິນຄ້າ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('reportExpense') }}"
                                            class="nav-link {{ request()->is('reportexpense*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານລາຍຈ່າຍ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('reportIncome') }}"
                                            class="nav-link {{ request()->is('reportincome*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ລາຍງານລາຍຮັບ</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @if ($permission === 1 || $permission === 3)
                            <li
                                class="nav-item {{ request()->is('doctors*') || request()->is('suppliers*') || request()->is('evaluation_types*') || request()->is('product_types*') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->is('doctors*') || request()->is('suppliers*') || request()->is('evaluation_types*') || request()->is('product_types*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-file-bar-graph"></i>
                                    <p>ຈັດການຂໍ້ມູນ<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('doctors.index') }}"
                                            class="nav-link {{ request()->is('doctors*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຂໍ້ມູນທ່ານໝໍ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('suppliers.index') }}"
                                            class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ຂໍ້ມູນຜູ້ສະໜອງ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('evaluation_types.index') }}"
                                            class="nav-link {{ request()->is('evaluation_types*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ປະເພດຜົນກວດ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('product_types.index') }}"
                                            class="nav-link {{ request()->is('product_types*') ? 'active' : '' }}">
                                            <p style="margin-left: 32.5px;">ປະເພດສິນຄ້າ</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('contents')
        </div>
    </div>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery/jquery.priceformat.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/adminLTE/js/adminlte.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap4.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert/sweetalert.min.js') }}"></script>

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

            $("#startdate").on("change", function() {
                if ($(this).val() != "")
                    $("#btn-submit").removeAttr("disabled");
                else
                    $("#btn-submit").attr("disabled", "disabled");
            });

            $("#enddate").on("change", function() {
                if ($(this).val() != "")
                    $("#btn-submit").removeAttr("disabled");
                else
                    $("#btn-submit").attr("disabled", "disabled");
            });


        });
    </script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    @if (Session::has('failed'))
        <script>
            swal({
                icon: "error",
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
                title: "{{ session('success') }}",
                button: "ຕົກລົງ",
            })
        </script>
    @endif


    @yield('script')

</body>

</html>
