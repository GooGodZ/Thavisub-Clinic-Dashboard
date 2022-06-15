@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ລາຍງານລາຍຈ່າຍ</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-search">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                                <form action="{{ route('reportExpenseSearch') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <label for="" class="form-label">ຕັ້ງແຕ່ວັນທີ</label>
                                            <input type="date" class="form-control" name="startdate">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <label for="" class="form-label">ເຖີງວັນທີ</label>
                                            <input type="date" class="form-control" name="enddate">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                            <button type="submit" class="button-search">ຄົ້ນຫາ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2 text-end">
                                <a href="{{ route('reportExpensePrint') }}" target="_blank">
                                    <button class="button-print">ພີມ</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
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
        </div>
    </div>
@endsection
