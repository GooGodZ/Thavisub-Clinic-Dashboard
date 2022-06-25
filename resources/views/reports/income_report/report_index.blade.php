@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານລາຍຮັບ</h1>
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
                            <td>ລະຫັດໃບບິນຮັບເງິນ</td>
                            <td>ວັນທີ ເດືອນ ປີ</td>
                            <td>ລວມຈຳນວນເງິນ</td>
                        </thead>
                        <tbody>
                            @foreach ($income as $income)
                                <tr>
                                    <td>{{ $income->pay_no }}</td>
                                    <td>{{ date('d-M-Y', strtotime($income->date)) }}</td>
                                    <td>{{ number_format($income->total) }} ກີບ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td class="text-end">ລວມທັງໝົດ:</td>
                                <td>{{ number_format($income_sum) }} ກີບ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
