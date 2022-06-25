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
                <div class="card-header bg-white">
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#appointmenttoday" data-toggle="tab">ອອກໃບນັດກວດມື້ນີ້</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="appointmenttoday">
                            <div class="card-body">
                                <div class="card-body">
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
                                                        <form action="">
                                                            <a href="{{ route('reportAppointmentPrint', $appointmenttoday->id) }}"
                                                                class="text-primary text-decoration-none"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="ພີມໃບນັດກວດ" target="_blank">
                                                                <i class="bi bi-printer"></i>
                                                            </a>
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
        </div>
    </section>
@endsection
