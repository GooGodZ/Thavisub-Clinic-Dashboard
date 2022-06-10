@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ລາຍງານຈຳນວນຄົນເຈັບ</p>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert-success">
            <span class="close-alert-button" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-search">
                        <form action="{{ route('reportPatientSearch') }}" method="post">
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
                    <div class="card-body-content-table">
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
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td>{{ $patient->name }}</td>
                                        <td class="table-english">{{ $patient->tel }}</td>
                                        <td class="table-english">{{ $patient->pt_id }}</td>
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
