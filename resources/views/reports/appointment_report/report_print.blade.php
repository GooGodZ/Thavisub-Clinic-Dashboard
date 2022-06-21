@extends('print_master')

@section('print')
    <div class="container">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluidr" style="width: 120px">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2 class="mt-3 font-bold">ໃບນັດກວດ</h2>
            <div class="row">
                <div class="col-8">
                    <h4 class="text-start">ຄລີນິກທະວີຊັບ</h4>
                </div>
                <div class="col-4">
                    <h4 class="text-start">ເລກທີ:</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <h4 class="text-start">ເບີໂທ: 20 99 706 568</h4>
                </div>
                <div class="col-5">
                    <h4 class="text-start">ເລກທີນັດກວດ: {{ $appointment->ap_no }}</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card border-0 mx-5">
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <h4>ຊື່ທ່ານໝໍ:</h4>
                        </th>
                        <td>
                            <h4 class="ms-5">{{ $appointment->doctors->name }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h4>ຊື່ຄົນເຈັບ:</h4>
                        </th>
                        <td>
                            <h4 class="ms-5">{{ $appointment->cases->patients->name }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h4>ວັນທີນັດກວດ:</h4>
                        </th>
                        <td>
                            <h4 class="ms-5">{{ date('d / m / Y', strtotime($appointment->date)) }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <h4>ເວລາ:</h4>
                        </th>
                        <td>
                            <h4 class="ms-5">{{ $appointment->time }}</h4>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
