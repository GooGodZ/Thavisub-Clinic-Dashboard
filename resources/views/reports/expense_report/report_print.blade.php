@extends('print_master')

@section('print')
    <div class="container">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluidr" style="width: 120px">
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2 class="mt-3 font-bold">ລາຍງານລາຍຈ່າຍ</h2>
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
                    <h4 class="text-start">ເບີໂທ:</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card border-0 mx-5">
                <table class="table table-hover" width="100%">
                    <thead>
                        <td>ລະຫັດໃບບິນສິນຄ້າ</td>
                        <td>ວັນທີ ເດືອນ ປີຊື້ເຂົ້າ</td>
                        <td>ລວມຈຳນວນເງິນ</td>
                    </thead>
                    <tbody>
                        @foreach ($expense as $expense)
                            <tr>
                                <td class="table-english">{{ $expense->buy_no }}</td>
                                <td class="table-english">{{ date('d-M-Y', strtotime($expense->date)) }}</td>
                                <td class="table-english">{{ $expense->price }} ກີບ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
