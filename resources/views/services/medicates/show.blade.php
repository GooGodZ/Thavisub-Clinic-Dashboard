@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນວາງຢາ</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('medicates.index') }}" class="btn float-end"
                        style="background-color: #28635a; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="text-center">ລາຍການວາງຢາ</h3>
                    <div class="row">
                        <div class="col">
                            <h4>ຊື່ ແລະ ນາມສະກຸນ: {{ $medicatestitle->cases->patients->name }}</h4>
                        </div>
                        <div class="col">
                            <h4 class="text-end">ວັນທີວາງຢາ: {{ date('d-M-Y', strtotime($medicatestitle->date)) }}</h4>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ຊື່ຢາ</td>
                            <td>ຈຳນວນ</td>
                            <td>ວິທີກິນຢາ</td>
                            <td>ລາຄາ</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($medicates as $medicates)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $medicates->products->name }}</td>
                                    <td>{{ number_format($medicates->quantity) }}</td>
                                    <td>
                                        @foreach ($medicates->take as $value)
                                            {{ $value }}
                                        @endforeach
                                    </td>
                                    <td>{{ number_format($medicates->price) }} ກີບ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-end" colspan="4">ລວມລາຄາທັງໝົດ:</td>
                                <td> {{ number_format($medicatessum) }} ກີບ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
