@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ລາຍງານປະຫວັດປິ່ນປົວ</p>
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
                                <form action="{{ route('reportEvaluationSearch') }}" method="post">
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
                        </div>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລະຫັດຄົນເຈັບ</td>
                                <td>ລະຫັດໝໍ</td>
                                <td>ຊື່ຄົນເຈັບ</td>
                                <td>ຈຳນວນຄັ້ງ</td>
                                <td></td>
                            </thead>
                            <tbody>
                                @foreach ($treatment as $treatment)
                                    <tr>
                                        <td class="table-english">{{ $treatment->pt_no }}</td>
                                        <td class="table-english">{{ $treatment->doc_no }}</td>
                                        <td>{{ $treatment->name }}</td>
                                        <td class="table-english">{{ $treatment->pt_id }}</td>
                                        <td>
                                            <form action="">
                                                <a href="{{ route('reportTreatmentShow', $treatment->id) }}">
                                                    <i class="fa-regular fa-file-lines"></i>
                                                </a>
                                            </form>
                                        </td>
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
