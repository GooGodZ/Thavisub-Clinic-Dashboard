@extends('home_master')

@section('contents')
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຂໍ້ມູນຄົນເຈັບ</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <div class="card-body-content-button">
                    <a href="{{ route('patients.index') }}"><button><i class="fa-solid fa-backward"></i>&nbsp;ກັບໄປຂໍ້ມູນຄົນເຈັບ</button></a>
                </div>
                <div class="card-body-content-form">
                    <form action="{{ route('patients.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                            <div class="col-9">
                                <input type="text" name="" class="form-control" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-3 col-form-label">ວັນ ເດືອນ ປີເກິດ</label>
                            <div class="col-9">
                                <input type="date" name="" class="form-control" placeholder="ປ້ອນວັນ ເດືອນ ປີເກິດ">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                            <div class="col-9">
                                <input type="number" name="" class="form-control" placeholder="ປ້ອນເບີໂທຕິດຕໍ່">
                            </div>
                        </div>
                        <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ອັບເດດຄົນເຈັບ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
