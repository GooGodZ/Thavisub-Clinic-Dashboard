@extends('print_master')

@section('print')
    <div class="container">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluidr" style="width: 120px">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2 class="mt-3 font-bold">ໃບຜົນກວດ</h2>
            <div class="row mb-4">
                <div class="col-8">
                    <h4 class="text-start">ຄລີນິກທະວີຊັບ</h4>
                    <h4 class="text-start">ເບີໂທ:</h4>
                </div>
                <div class="col-4">
                    <h4 class="text-start">ເລກທີ:</h4>
                    <h4 class="text-start">ວັນທີ: {{ date('d M Y', strtotime($evaluation->date)) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h4>ຊື່ຄົນເຈັບ: {{ $evaluation->cases->patients->name }}</h4>
            <h4>ຊື່ທ່ານໝໍ: {{ $evaluation->cases->doctors->name }}</h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card m-3 p-3 border-1 border-dark">
                <h4>ຄວາມດັນ: {{ $evaluation->cases->pressure }} mmHg</h4>
                <h4>ຊີບພະຈອນ: {{ $evaluation->cases->pulse }} bpm</h4>
                <h4>ອຸນຫະພູມ: {{ $evaluation->cases->temper }} °C</h4>
                <h4>ລະບົບທາງເດີນຫາຍໃຈ: {{ $evaluation->cases->respira }} bpm</h4>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card m-3 p-3 border-1 border-dark">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ປະເພດຜົນກວດ</td>
                            <td>ລາຍລະອຽດການກວດ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $evaluation->evaluation_types->name }}</td>
                            <td>{{ $evaluation->detail }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h4 class="text-end me-5">ເຊັນທ່ານໝໍ</h4>
        </div>
    </div>
@endsection
