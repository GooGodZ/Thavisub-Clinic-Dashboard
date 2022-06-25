@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນການຊຳລະ</h1>
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#payments" data-toggle="tab">ຍັງບໍ່ທັນຊຳລະ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#paymentstoday" data-toggle="tab">ຊຳລະແລ້ວ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="payments">
                            <div class="card-body">
                                <div class="card-body">
                                    <table id="mytable" class="table table-hover" width="100%">
                                        <thead>
                                            <td>ລຳດັບ</td>
                                            <td>ລະຫັດຜົນກວດ</td>
                                            <td>ຊື່ຄົນເຈັບ</td>
                                            <td>ວັນທີຜົນກວດ</td>
                                            <td>ສະຖານະ</td>
                                            <td>ສະແດງຂໍ້ມູນ</td>
                                        </thead>
                                        <tbody>
                                            @php
                                                $number = 1;
                                            @endphp
                                            @foreach ($cases as $cases)
                                                <tr>
                                                    <td>{{ $number++ }}</td>
                                                    <td>{{ $cases->c_no }}</td>
                                                    <td>{{ $cases->patients->name }}</td>
                                                    <td>{{ date('d-M-Y', strtotime($cases->date)) }}</td>
                                                    <td>
                                                        {{ $cases->status !== 0 && $cases->status !== 1 && $cases->status !== 2 && $cases->status !== 3 ? 'ຊຳລະແລ້ວ' : 'ຍັງບໍ່ທັນຊຳລະ' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('paymentsCreateLink', $cases->id) }}"
                                                            class="text-primary text-decoration-none"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ຊຳລະເງິນ">
                                                            <i class="bi bi-box-arrow-up-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="paymentstoday">
                            <div class="card-body">
                                <table id="mytable2" class="table table-hover" width="100%">
                                    <thead>
                                        <td>ລຳດັບ</td>
                                        <td>ລະຫັດໃບບິນ</td>
                                        <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                        <td>Action</td>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($payments as $payments)
                                            <tr>
                                                <td>{{ $number++ }}</td>
                                                <td>{{ $payments->pay_no }}</td>
                                                <td>{{ $payments->cases->patients->name }}</td>
                                                <td>
                                                    <form action="{{ route('payments.destroy', $payments->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('payments.show', $payments->id) }}"
                                                            class="text-primary text-decoration-none"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ພີມໃບບິນ" target="_blank">
                                                            <i class="bi bi-printer"></i></i>
                                                        </a>
                                                        <button type="submit" class="bg-transparent border-0 text-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ລົບຂໍ້ມູນ"
                                                            onclick="return confirm('ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ?')">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
