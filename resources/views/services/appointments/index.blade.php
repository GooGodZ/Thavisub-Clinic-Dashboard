@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນນັດກວດ</h1>
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
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#appointments"
                                type="button">ນັດກວດມື້ນີ້</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#appointmentstoday"
                                type="button">ອອກໃບນັດກວດມື້ນີ້</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="appointments">
                            <div class="card-header" style="background-color: white">
                                <a href="{{ route('appointments.create') }}"class="btn float-end"
                                    style="background-color: #8ebaa8; color: white">
                                    <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="mytable" class="table table-hover" width="100%">
                                    <thead>
                                        <td>ລຳດັບ</td>
                                        <td>ລະຫັດນັດກວດ</td>
                                        <td>ຊື່ຄົນເຈັບ</td>
                                        <td>ວັນ ເດືອນ ປີນັດກວດ</td>
                                        <td>ເວລານັດກວດ</td>
                                        <td>ທ່ານໝໍ</td>
                                        <td>ສະຖານະ</td>
                                        <td>Action</td>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($appointments as $appointments)
                                            <tr>
                                                <td>{{ $number++ }}</td>
                                                <td>{{ $appointments->ap_no }}</td>
                                                <td>{{ $appointments->cases->patients->name }}</td>
                                                <td>{{ date('d-M-Y', strtotime($appointments->date)) }}
                                                </td>
                                                <td>{{ $appointments->time }}</td>
                                                <td>{{ $appointments->doctors->name }}</td>
                                                <td>
                                                    {{ $appointments->status == 0 ? 'ລໍຖ້າລົງທະບຽນ' : 'ລົງທະບຽນແລ້ວ' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('casesCreateLinkAppointments', $appointments->id) }}"
                                                        class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="ລົງທະບຽນກວດ">
                                                        <i class="bi bi-box-arrow-up-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="appointmentstoday">
                            <table id="mytable2" class="table table-hover" width="100%">
                                <thead>
                                    <td>ລຳດັບ</td>
                                    <td>ລະຫັດຜົນກວດ</td>
                                    <td>ຊື່ຄົນເຈັບ</td>
                                    <td>ວັນທີຜົນກວດ</td>
                                    <td>ສະຖານະ</td>
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
                                                {{ $cases->status !== 0 && $cases->status !== 1 && $cases->status !== 2 ? 'ອອກໃບນັດກວດແລ້ວ' : 'ລໍຖ້າໃບນັດກວດ' }}
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
