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
                <div class="card-header" style="background-color: white">
                    <form action="{{ route('reportEvaluationSearch') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">ຕັ້ງແຕ່ວັນທີ</label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" name="startdate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">ເຖີງວັນທີ</label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" name="enddate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <button type="submit" class="btn float-start"
                                    style="background-color: #8ebaa8; color: white">
                                    <i class="bi bi-search"></i>&nbsp;ຄົ້ນຫາ</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-report" width="100%">
                        <thead>
                            <td>ລະຫັດຄົນເຈັບ</td>
                            <td>ລະຫັດໝໍ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ວັນທີ ເດືອນ ປີ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @foreach ($evaluation as $evaluation)
                                <tr>
                                    <td class="table-english">{{ $evaluation->pt_no }}</td>
                                    <td class="table-english">{{ $evaluation->doc_no }}</td>
                                    <td class="table-english">{{ $evaluation->pt_name }}</td>
                                    <td class="table-english">{{ date('d-M-Y', strtotime($evaluation->date)) }}</td>
                                    <td class="table-english">
                                        <form action="">
                                            <a href="{{ route('reportEvaluationPrint', $evaluation->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ພີມໃບຜົນກວດ" target="_blank">
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
    </section>
@endsection
