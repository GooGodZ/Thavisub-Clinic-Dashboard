@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ໜ້າຫຼັກ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $casesDay }}</h3>
                            <p>ຄົນເຈັບໃນມື້ນີ້</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $appointments }}</h3>
                            <p>ຄົນເຈັບນັດກວດມື້ນີ້</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $casesMonth }}</h3>
                            <p>ຄົນເຈັບພາຍໃນເດືອນ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $doctors }}</h3>
                            <p>ຂໍ້ມູນທ່ານໝໍ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <section class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#patients-chart"
                                        type="button">ຄົນເຈັບ</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#medicates-chart"
                                        type="button">ສິນຄ້າທີ່ໃຊ້ໄປ</button>
                                </li>
                            </ul>
                            <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="patients-chart"
                                    style="position: relative; height: 300px;">
                                    <canvas id="myBar1"></canvas>
                                </div>
                                <div class="tab-pane fade" id="medicates-chart" style="position: relative; height: 300px;">
                                    <canvas id="myBar2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h3 class="card-title">ລາຍຮັບຕໍ່ອາທິດ</h3>
                        </div>
                        <div class="card-body" style="position: relative; height: 342.5px;">
                            <div class="inner">
                                <h3 class="card-title">{{ number_format($payments_sum) }} ກີບ</h3>
                            </div>
                            <table class="table table-hover" width="100%">
                                <thead>
                                    <td>ລຳດັບ</td>
                                    <td>ວັນທີ ເດືອນ ປີ</td>
                                    <td>ຈຳນວນ</td>
                                </thead>
                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($payments as $payments)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ date('d-M-Y', strtotime($payments->date)) }}</td>
                                            <td>{{ number_format($payments->total) }} ກີບ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        var _ydata = JSON.parse('{!! json_encode($months) !!}');
        var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');

        const bar1 = document.getElementById('myBar1');
        const myBar1 = new Chart(bar1, {
            type: 'bar',
            data: {
                labels: _ydata,
                datasets: [{
                    label: 'ຄົນເຈັບພາຍໃນເດືອນ',
                    data: _xdata,
                    backgroundColor: [
                        'rgba(142, 186, 168, 0.75)',
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var _ydata = JSON.parse('{!! json_encode($productName) !!}');
        var _xdata = JSON.parse('{!! json_encode($productCount) !!}');

        const bar2 = document.getElementById('myBar2');
        const myBar2 = new Chart(bar2, {
            type: 'bar',
            data: {
                labels: _ydata,
                datasets: [{
                    label: 'ຈຳນວນສິນຄ້າທີ່ໃຊ້ໄປພາຍໃນເດືອນ',
                    data: _xdata,
                    backgroundColor: [
                        'rgba(142, 186, 168, 0.75)',
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
