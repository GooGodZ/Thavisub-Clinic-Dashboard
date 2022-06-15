@extends('print_master')

@section('print')
    <div class="container">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluidr" style="width: 120px">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2 class="mt-3 font-bold">ໃບສັ່ງຊື້ສິນຄ້າ</h2>
            <div class="row mb-4">
                <div class="col-8">
                    <h4 class="text-start">ຄລີນິກທະວີຊັບ</h4>
                    <h4 class="text-start">ເບີໂທ:</h4>
                </div>
                <div class="col-4">
                    <h4 class="text-start">ເລກທີ:</h4>
                    <h4 class="text-start">ວັນທີ: {{ date('d-M-Y', strtotime($orders->created_at)) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h4>ຜູ້ສະໜອງ: {{ $orders->suppliers->name }}</h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card m-3 p-3 border-1 border-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ລຳດັບ</td>
                            <td>ຊື່ສິນຄ້າ</td>
                            <td>ຈຳນວນ</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($order_details as $order_details)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $order_details->products->name }}</td>
                                <td>{{ $order_details->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h4 class="text-end me-5">ເຊັນຜູ້ສັ່ງຊື້</h4>
        </div>
    </div>
@endsection
