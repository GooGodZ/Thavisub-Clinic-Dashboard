@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຄົນເຈັບໃນມື້ນີ້</p>
                    <p class="card-body-content">{{ $casesDay }}&nbsp;<span>ຄົນ</span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຄົນເຈັບນັດກວດມື້ນີ້</p>
                    <p class="card-body-content">{{ $appointments }}&nbsp;<span>ຄົນ</span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຄົນເຈັບພາຍໃນເດືອນ</p>
                    <p class="card-body-content">{{ $casesMonth }}&nbsp;<span>ຄົນ</span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນທ່ານໝໍ</p>
                    <p class="card-body-content">{{ $doctors }}&nbsp;<span>ຄົນ</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຈຳນວນຄົນເຈັບ</p>
                    <div class="card-body-content-bar">
                        <canvas id="myBar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="container">
                    <p class="card-head-top2 text-center">ລາຍຮັບ</p>
                    <div class="card-body-content-total">
                        <p>ລາຍຮັບລວມ</p>
                        <span>{{ $payments_sum }} ກີບ</span>
                    </div>
                    <div class="card-body-content-table">
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
                                        <td>{{ $payments->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ລາຍງານຢາທີ່ເຫຼືອ</p>
                    <div class="card-body-content-donut">
                        <canvas id="myDonut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var _ydata = JSON.parse('{!! json_encode($months) !!}');
        var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');

        const bar = document.getElementById('myBar');
        const myBar = new Chart(bar, {
            type: 'bar',
            data: {
                labels: _ydata,
                datasets: [{
                    label: 'ຈຳນວນຄົນເຈັບແຕ່ລະເດືອນ',
                    data: _xdata,
                    backgroundColor: [
                        'rgba(0, 255, 1, 0.75)',
                    ]
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "World Wine Production 2018"
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var _ydata = JSON.parse('{!! json_encode($productName) !!}');
        var _xdata = JSON.parse('{!! json_encode($productCount) !!}');

        const donut = document.getElementById('myDonut');
        const myDonut = new Chart(donut, {
            type: 'doughnut',
            data: {
                labels: _ydata,
                datasets: [{
                    data: _xdata,
                    backgroundColor: [
                        'rgba(0, 255, 1, 0.75)',
                        'rgba(255, 255, 1, 0.75)',
                        'rgba(255, 127, 0, 0.75)',
                        'rgba(254, 0, 0, 0.75)',
                        'rgba(255, 0, 254, 0.75)',
                        'rgba(127, 0, 255, 0.75)',
                        'rgba(0, 0, 254, 0.75)',
                        'rgba(1, 255, 255, 0.75)',
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>
@endsection
