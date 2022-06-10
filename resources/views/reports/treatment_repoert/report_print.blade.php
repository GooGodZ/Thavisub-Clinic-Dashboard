@extends('print_master')

@section('print')
    <div class="container">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluidr" style="width: 120px">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2 class="mt-3 font-bold">ໃບປະຫວັດການປີ່ນປົວ</h2>
            <div class="row mb-4">
                <div class="col-8">
                    <h4 class="text-start">ຄລີນິກທະວີຊັບ</h4>
                    <h4 class="text-start">ເບີໂທ:</h4>
                </div>
                <div class="col-4">
                    <h4 class="text-start">ເລກທີ:</h4>
                    <h4 class="text-start">ວັນທີ: {{ date('d M Y', strtotime($date_today)) }}</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h4>ຊື່ຄົນເຈັບ: {{ $evaluation->cases->patients->name }}</h4>
            <h4>ຊື່ທ່ານໝໍ: {{ $evaluation->cases->doctors->name }}</h4>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card m-3 p-3 border-1 border-dark">
                <table class="table">
                    <thead>
                        <td>ລຳດັບ</td>
                        <td>ອາການ</td>
                        <td>ປະເພດກວດ</td>
                        <td>ບົງມະຕິພະຍາດ</td>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($treatment as $treatment)
                            <tr>
                                <td class="table-english">{{ $number++ }}</td>
                                <td class="table-english">{{ $treatment->disea }}</td>
                                <td class="table-english">{{ $treatment->name }}</td>
                                <td class="table-english">{{ $treatment->detail }}</td>
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
