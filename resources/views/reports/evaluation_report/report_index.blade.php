@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານຜົນກວດ</h1>
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
                                <a class="nav-link active" href="#evaluationtoday" data-toggle="tab">ອອກໃບຜົນກວດມື້ນີ້</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="evaluationtoday">
                            <div class="card-body">
                                <div class="card-body">
                                    <table id="mytable" class="table table-hover" width="100%">
                                        <thead>
                                            <td>ລະຫັດຄົນເຈັບ</td>
                                            <td>ລະຫັດໝໍ</td>
                                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                            <td>ວັນທີ ເດືອນ ປີ</td>
                                            <td>Action</td>
                                        </thead>
                                        <tbody>
                                            @foreach ($casetoday as $casetoday)
                                                <tr>
                                                    <td>{{ $casetoday->pt_no }}</td>
                                                    <td>{{ $casetoday->doc_no }}</td>
                                                    <td>{{ $casetoday->name }}</td>
                                                    <td>{{ date('d-M-Y', strtotime($casetoday->date)) }}</td>
                                                    <td>
                                                        <form action="">
                                                            <a href="{{ route('reportEvaluationPrint', $casetoday->id) }}"
                                                                class="text-primary text-decoration-none"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="ພີມໃບຜົນກວດ" target="_blank">
                                                                <i class="bi bi-printer"></i></i>
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
