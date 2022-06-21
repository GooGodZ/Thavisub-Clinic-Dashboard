@extends('print_master')

@section('print')
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluidr" style="width: 120px">
        </div>
        <div class="text-center">
            <h2 class="mt-3 font-bold">ໃບບິນຮັບເງິນ</h2>
            <div class="row mb-4">
                <div class="col-8">
                    <h4 class="text-start">ຄລີນິກທະວີຊັບ</h4>
                    <h4 class="text-start">ເບີໂທ: 20 99 706 568</h4>
                </div>
                <div class="col-4">
                    <h4 class="text-start">ເລກທີ:</h4>
                    <h4 class="text-start">ວັນທີ: {{ date('d M Y', strtotime($payments->date)) }}</h4>
                </div>
            </div>
            <div class="mb-4">
                <h4 class="text-start">ລະຫັດຄົນເຈັບ: {{ $payments->cases->patients->pt_no }}</h4>
                <h4 class="text-start">ຊື່ຄົນເຈັບ: {{ $payments->cases->patients->name }}</h4>
                <h4 class="text-start">ລະຫັດລົງທະບຽນກວດ: {{ $payments->cases->c_no }}</h4>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%">
                <thead>
                    <td>ລຳດັບ</td>
                    <td>ລາຍການ</td>
                    <td>ຈຳນວນ</td>
                    <td>ລາຄາ</td>
                    <td>ຈຳນວນເງິນ</td>
                </thead>
                <tbody>
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($medicates as $medicates)
                        <tr>
                            <td class="table-english">{{ $number++ }}</td>
                            <td>{{ $medicates->products->name }}</td>
                            <td class="table-english">{{ $medicates->quantity }}</td>
                            <td class="table-english">{{ number_format($medicates->products->price) }} ກີບ</td>
                            <td class="table-english">{{ number_format($medicates->price) }} ກີບ</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="table-english">{{ $number++ }}</td>
                        <td>ຄ່າປິ່ນປົວ</td>
                        <td class="table-english"></td>
                        <td class="table-english"></td>
                        <td class="table-english">{{ number_format($payments->price_e) }} ກີບ</td>
                    </tr>
                    <tr>
                        <td class="text-end" colspan="4">ລວມເງິນທັງໝົດ:</td>
                        <td class="table-english">{{ number_format($payments->total) }} ກີບ</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col">
                <h4 class="text-start">ເຊັນຜູ້ຮັບເງິນ</h4>
            </div>
            <div class="col">
                <h4 class="text-end">ເຊັນຜູ້ຈ່າຍເງິນ</h4>
            </div>
        </div>
    </div>
@endsection
