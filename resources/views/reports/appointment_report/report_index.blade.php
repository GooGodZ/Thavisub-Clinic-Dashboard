@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານການນັດກວດ</h1>
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
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#appointmenttoday"
                                type="button">ອອກໃບນັດກວດມື້ນີ້</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#appointmentall"
                                type="button">ໃບນັດກວດທັງໝົດ</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="appointmenttoday">
                            <table id="mytable" class="table table-hover" width="100%">
                                <thead>
                                    <td>ລະຫັດຄົນເຈັບ</td>
                                    <td>ລະຫັດໝໍ</td>
                                    <td>ລະຫັດລົງທະບຽນກວດ</td>
                                    <td>ຊື່ຄົນເຈັບ</td>
                                    <td>ວັນທີນັດກວດ</td>
                                    <td>Action</td>
                                </thead>
                                <tbody>
                                    @foreach ($appointmenttoday as $appointmenttoday)
                                        <tr>
                                            <td>{{ $appointmenttoday->pt_no }}</td>
                                            <td>{{ $appointmenttoday->doc_no }}</td>
                                            <td>{{ $appointmenttoday->c_no }}</td>
                                            <td>{{ $appointmenttoday->name }}</td>
                                            <td>{{ date('d-M-Y', strtotime($appointmenttoday->date)) }}</td>
                                            <td>
                                                <a href="{{ route('reportAppointmentPrint', $appointmenttoday->id) }}"
                                                    class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="ພີມໃບນັດກວດ" target="_blank">
                                                    <i class="bi bi-printer"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="appointmentall">
                            <table id="mytable2" class="table table-hover" width="100%">
                                <thead>
                                    <td>ລະຫັດຄົນເຈັບ</td>
                                    <td>ລະຫັດໝໍ</td>
                                    <td>ລະຫັດລົງທະບຽນກວດ</td>
                                    <td>ຊື່ຄົນເຈັບ</td>
                                    <td>ວັນທີນັດກວດ</td>
                                </thead>
                                <tbody>
                                    @foreach ($appointmentall as $appointmentall)
                                        <tr>
                                            <td>{{ $appointmentall->pt_no }}</td>
                                            <td>{{ $appointmentall->doc_no }}</td>
                                            <td>{{ $appointmentall->c_no }}</td>
                                            <td>{{ $appointmentall->name }}</td>
                                            <td>{{ date('d-M-Y', strtotime($appointmentall->date)) }}</td>
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
