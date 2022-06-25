@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານປະຫວັດປິ່ນປົວ</h1>
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
                            <a href="{{ route('reportTreatmentPrint', $treatment->id) }}" class="btn float-end"
                                style="background-color: #8ebaa8; color: white" target="_blank"><i
                                    class="bi bi-printer"></i>&nbsp;ພີມ</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ວັນທີກວດ</td>
                            <td>ອາການ</td>
                            <td>ປະເພດກວດ</td>
                            <td>ບົງມະຕິພະຍາດ</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($treatments as $treatments)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ date('d-M-Y', strtotime($treatments->date)) }}</td>
                                    <td>{{ $treatments->disea }}</td>
                                    <td>{{ $treatments->name }}</td>
                                    <td>{{ $treatments->detail }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
