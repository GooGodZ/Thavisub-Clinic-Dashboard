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
                <div class="card-header" style="background-color: white">
                    <form action="{{ route('reportExpenseSearch') }}" method="post">
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
    </section>
@endsection
