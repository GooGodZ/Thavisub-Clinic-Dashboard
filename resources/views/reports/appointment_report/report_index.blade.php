@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ລາຍງານການນັດກວດ</p>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert-success">
            <span class="close-alert-button" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-search">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                                <form action="{{ route('reportAppointmentSearch') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <label for="" class="form-label">ຕັ້ງແຕ່ວັນທີ</label>
                                            <input type="date" class="form-control" name="startdate">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <label for="" class="form-label">ເຖີງວັນທີ</label>
                                            <input type="date" class="form-control" name="enddate">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <button type="submit" class="button-search">ຄົ້ນຫາ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-report" width="100%">
                            <thead>
                                <td>ລະຫັດຄົນເຈັບ</td>
                                <td>ລະຫັດໝໍ</td>
                                <td>ລະຫັດລົງທະບຽນກວດ</td>
                                <td>ຊື່ຄົນເຈັບ</td>
                                <td>ວັນທີນັດກວດ</td>
                                <td>ເວລານັດກວດ</td>
                                <td></td>
                                <td></td>
                            </thead>
                            <tbody>
                                @foreach ($appointment as $appointment)
                                    <tr>
                                        <td class="table-english">{{ $appointment->pt_no }}</td>
                                        <td class="table-english">{{ $appointment->doc_no }}</td>
                                        <td class="table-english">{{ $appointment->c_no }}</td>
                                        <td class="table-english">{{ $appointment->name }}</td>
                                        <td class="table-english">{{ date('d-M-Y', strtotime($appointment->date)) }}</td>
                                        <td class="table-english">{{ $appointment->time }}</td>
                                        <td class="table-english">{{ $appointment->created_at }}</td>
                                        <td class="table-english">
                                            <form action="">
                                                <a href="{{ route('reportAppointmentPrint', $appointment->id) }}"
                                                    target="_blank">
                                                    <i class="fa-solid fa-print"></i>
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
@endsection
