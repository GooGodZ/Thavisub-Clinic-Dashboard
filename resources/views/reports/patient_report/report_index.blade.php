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
                    {{-- <form action="{{ url('reportpatients_search') }}" method="GET">
                        <input type="date" name="start_date">
                        <input type="date" name="end_date">
                        <button type="submit" class="btn btn-success"></button>
                    </form> --}}
                    {{-- <div class="card-body-content-button">
                        <a href="{{ route('report_patients.create') }}">
                            <button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                        </a>
                    </div> --}}
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລະຫັດ</td>
                                <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                <td>ເບີໂທຕິດຕໍ່</td>
                                <td>ຈຳນວນຄັ້ງ</td>
                            </thead>
                            <tbody>
                                @foreach ($report_patients as $key => $report_patients_count)
                                    @foreach ($report_patients_count as $report_patients_show)
                                        <tr>
                                            <td class="table-english">{{ $report_patients_show->patients->id }}</td>
                                            <td>{{ $report_patients_show->patients->name }}</td>
                                            <td class="table-english">{{ $report_patients_show->patients->tel }}</td>
                                            <td class="table-english">{{ $report_patients_count->count() }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                {{-- @foreach ($search_date as $search_date)
                                    <tr>
                                        <td class="table-english">{{ $search_date->patients->id }}</td>
                                        <td>{{ $search_date->patients->name }}</td>
                                        <td class="table-english">{{ $search_date->patients->tel }}</td>
                                        <td class="table-english">{{ $search_date->count() }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
