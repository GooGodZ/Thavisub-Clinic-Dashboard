@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານຈຳນວນຄົນເຈັບ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <form action="{{ route('reportPatientSearch') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">ຕັ້ງແຕ່ວັນທີ</label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" name="startdate" id="startdate"
                                            value="{{ request()->input('startdate') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group row">
                                    <label class="col-4 col-form-label">ເຖີງວັນທີ</label>
                                    <div class="col-8">
                                        <input type="date" class="form-control" name="enddate" id="enddate"
                                            value="{{ request()->input('enddate') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <button type="submit" class="btn float-start" id="btn-submit"
                                    style="background-color: #8ebaa8; color: white" disabled>
                                    <i class="bi bi-search"></i>&nbsp;ຄົ້ນຫາ</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ເບີໂທຕິດຕໍ່</td>
                            <td>ຈຳນວນຄັ້ງ</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($patient as $patient)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->tel }}</td>
                                    <td>{{ $patient->pt_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
