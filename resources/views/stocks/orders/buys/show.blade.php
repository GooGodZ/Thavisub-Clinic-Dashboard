@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('orders.index') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="text-center">
                        <h3>ລາຍການການຊື້ຢາເຂົ້າ</h3>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h4>ຊື່ ແລະ ນາມສະກຸນ: {{ $buys->orders->name }}</h4>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h4 class="text-end">ວັນທີຊື້ເຂົ້າ: {{ date('d-M-Y', strtotime($buys->date)) }}
                            </h4>
                        </div>
                    </div>
                    <div class="card-body-content-table">
                        <table class="table table-hover">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ຊື່ຢາ</td>
                                <td>ຈຳນວນ</td>
                                <td>ລາຄາ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($buy_details as $buy_details)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $buy_details->products->name }}</td>
                                        <td class="table-english">{{ $buy_details->quantity }}</td>
                                        <td class="table-english">{{ $buy_details->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <h4 class="text-end">ລວມລາຄາທັງໝົດ: {{ $buy_details_sum }} ກີບ</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
