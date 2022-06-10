@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ລາຍງານຈຳນວນສິນຄ້າ</p>
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
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                <td>ເບີໂທຕິດຕໍ່</td>
                                <td>ຈຳນວນຄັ້ງ</td>
                            </thead>
                            <tbody>
                                <tr>
                                        <td class="table-english"></td>
                                        <td></td>
                                        <td class="table-english"></td>
                                        <td class="table-english"></td>
                                    </tr>
                                {{-- @foreach ($report_patients as $key => $report_patients_count)
                                    @foreach ($report_patients_count as $report_patients)
                                        <tr>
                                            <td class="table-english">{{ $number++ }}</td>
                                            <td>{{ $report_patients->patients->name }} </td>
                                            <td class="table-english">{{ $report_patients->patients->tel }}</td>
                                            <td class="table-english">{{ $report_patients_count->count() }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
