@extends('home_master')

@section('contents')
<div class="row">
    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຄົນເຈັບໃນມື້ນີ້</p>
                <p class="card-body-content">29&nbsp;<span>ຄົນ</span></p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຄົນເຈັບນັດກວດມື້ນີ້</p>
                <p class="card-body-content">29&nbsp;<span>ຄົນ</span></p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຄົນເຈັບພາຍໃນເດືອນ</p>
                <p class="card-body-content">29&nbsp;<span>ຄົນ</span></p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຂໍ້ມູນທ່ານໝໍ</p>
                <p class="card-body-content">29&nbsp;<span>ຄົນ</span></p>
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
                <p class="card-head-top text-center">ລາຍຮັບ</p>
                <div class="card-body-content-total">
                    <p>ລາຍຮັບລວມ</p>
                    <span>1290.00</span>
                </div>
                <table id="mytable" class="table table-hover">
                    <thead>
                        <td>ລຳດັບ</td>
                        <td>ວັນທີ ເດືອນ ປີ</td>
                        <td>ຈຳນວນ</td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>21/2/2021</td>
                            <td>100.000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>22/2/2021</td>
                            <td>200.000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>23/2/2021</td>
                            <td>300.000</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>24/2/2021</td>
                            <td>400.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ລາຍງານການຂາຍຢາ</p>
                <div class="card-body-content-donut">
                    <canvas id="myDonut"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
