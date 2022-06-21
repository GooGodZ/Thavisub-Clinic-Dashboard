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
                    <a href="{{ route('reportTreatment') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="text-center">ລາຍງານປະຫວັດການປີ່ນປົວ</h3>
                    <div class="row">
                        <div class="col">
                            <h4>ຊື່ ແລະ ນາມສະກຸນ: {{ $patients->name }}</h4>
                        </div>
                        <div class="col">
                            <a href="{{ route('reportTreatmentPrint', $evaluation->id) }}" class="btn float-end"
                                style="background-color: #8ebaa8; color: white" target="_blank"><i
                                    class="bi bi-printer"></i>&nbsp;ພີມ</a>
                        </div>
                    </div>
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
    </section>
    {{-- <div class="row">
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
                            <a href="{{ route('reportTreatmentPrint', $evaluation->id) }}" target="_blank"><button
                                    class="button-print">ພີມ</button></a>
                        </div>
                    </div>
                    <div class="card-body-content-table">

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
