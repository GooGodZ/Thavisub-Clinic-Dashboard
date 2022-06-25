@extends('print_master')

@section('print')
    <div class="container">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluidr" style="width: 120px">
            <h2 class="mt-3 font-bold">ໃບຜົນກວດ</h2>
            <div class="row mb-4">
                <div class="col-8">
                    <h4 class="text-start">ຄລີນິກທະວີຊັບ</h4>
                    <h4 class="text-start">ເບີໂທ: 20 99 706 568</h4>
                </div>
                <div class="col-4">
                    <h4 class="text-start">ເລກທີ: {{ $cases->c_no }}</h4>
                    <h4 class="text-start">ວັນທີ: {{ date('d M Y', strtotime($cases->date)) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h4>ຊື່ຄົນເຈັບ: {{ $cases->patients->name }}</h4>
            <h4>ຊື່ທ່ານໝໍ: {{ $cases->doctors->name }}</h4>
            <div class="card m-3 p-3 border-1 border-dark">
                <h4>ຄວາມດັນ: {{ $cases->pressure }} mmHg</h4>
                <h4>ຊີບພະຈອນ: {{ $cases->pulse }} bpm</h4>
                <h4>ອຸນຫະພູມ: {{ $cases->temper }} °C</h4>
                <h4>ອັດຕາການຫາຍໃຈ: {{ $cases->respira }} bpm</h4>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card m-3 p-3 border-1 border-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ລຳດັບ</td>
                            <td>ປະເພດຜົນກວດ</td>
                            <td>ລາຍລະອຽດການກວດ</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($evaluations as $evaluations)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $evaluations->evaluation_types->name }}</td>
                                <td>{{ $evaluations->detail }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card m-3 p-3 border-1 border-dark">
                <table class="table">
                    <thead>
                        <td>ລຳດັບ</td>
                        <td>ຊື່ຢາ</td>
                        <td>ວິທີກິນຢາ</td>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($medicates as $medicates)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $medicates->products->name }}</td>
                                <td>
                                    @foreach ($medicates->take as $value)
                                        {{ $value }}
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h4 class="text-end me-5">ເຊັນທ່ານໝໍ</h4>
        </div>
    </div>
@endsection
