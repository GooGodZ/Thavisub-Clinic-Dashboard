@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('reportTreatment') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="text-center">
                        <h3>ລາຍງານປະຫວັດການປີ່ນປົວ</h3>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <h4>ຊື່ ແລະ ນາມສະກຸນ: {{ $patients->name }}</h4>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-end">
                            <a href="{{ route('reportTreatmentPrint', $evaluation->id) }}" target="_blank"><button class="button-print">ພີມ</button></a>
                        </div>
                    </div>
                    <div class="card-body-content-table">
                        <table class="table table-hover">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ອາການ</td>
                                <td>ປະເພດກວດ</td>
                                <td>ບົງມະຕິພະຍາດ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($treatment as $treatment)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $treatment->disea }}</td>
                                        <td class="table-english">{{ $treatment->name }}</td>
                                        <td class="table-english">{{ $treatment->detail }}</td>
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
