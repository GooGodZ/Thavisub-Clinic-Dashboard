@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນການຊຳລະ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#payments" type="button"
                                style="font-weight: 600">ຍັງບໍ່ທັນຊຳລະ</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#paymentstoday" type="button"
                                style="font-weight: 600">ຊຳລະແລ້ວ</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="payments">
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
                                                    class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="ຊຳລະເງິນ">
                                                    <i class="bi bi-box-arrow-up-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="paymentstoday">
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
                                                <a href="{{ route('payments.show', $payments->id) }}"
                                                    class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="ພີມໃບບິນ" target="_blank">
                                                    <i class="bi bi-printer"></i>
                                                </a>
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
    </section>
@endsection
