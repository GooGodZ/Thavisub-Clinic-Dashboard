@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານລາຍຈ່າຍ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລະຫັດໃບບິນສິນຄ້າ</td>
                            <td>ວັນທີ ເດືອນ ປີຊື້ເຂົ້າ</td>
                            <td>ລວມຈຳນວນເງິນ</td>
                        </thead>
                        <tbody>
                            @foreach ($expense as $expense)
                                <tr>
                                    <td>{{ $expense->buy_no }}</td>
                                    <td>{{ date('d-M-Y', strtotime($expense->date)) }}</td>
                                    <td>{{ number_format($expense->price) }} ກີບ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="text-end">ລວມທັງໝົດ:</td>
                                <td>{{ number_format($expense_sum) }} ກີບ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
