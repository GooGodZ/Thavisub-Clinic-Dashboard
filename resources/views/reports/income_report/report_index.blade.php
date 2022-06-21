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
                <div class="card-header" style="background-color: white">
                    <form action="{{ route('reportIncomeSearch') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">ຕັ້ງແຕ່ວັນທີ</label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" name="startdate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">ເຖີງວັນທີ</label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" name="enddate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <button type="submit" class="btn float-start"
                                    style="background-color: #8ebaa8; color: white">
                                    <i class="bi bi-search"></i>&nbsp;ຄົ້ນຫາ</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover" width="100%">
                        <thead>
                            <td>ລະຫັດໃບບິນຮັບເງິນ</td>
                            <td>ວັນທີ ເດືອນ ປີ</td>
                            <td>ລວມຈຳນວນເງິນ</td>
                        </thead>
                        <tbody>
                            @foreach ($income as $income)
                                <tr>
                                    <td class="table-english">{{ $income->pay_no }}</td>
                                    <td class="table-english">{{ date('d-M-Y', strtotime($income->date)) }}</td>
                                    <td class="table-english">{{ $income->total }} ກີບ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-end">ລວມທັງໝົດ:</td>
                                <td>{{ $income_sum }} ກີບ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
