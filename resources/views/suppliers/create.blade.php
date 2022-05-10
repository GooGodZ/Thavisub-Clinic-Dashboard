@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນຜູ້ສະໝອງ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('suppliers.index') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    @if ($errors->any())
                        <ul class="errors">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="card-body-content-form">
                        <form action="{{ route('suppliers.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <label class="col-3 col-form-label">ຊື່ຜູ້ສະໝອງ</label>
                                <div class="col-9">
                                    <input type="text" name="name" class="form-control" placeholder="ປ້ອນຊື່ຜູ້ສະໝອງ">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                                <div class="col-9">
                                    <input type="text" name="tel" class="form-control" placeholder="ປ້ອນເບີໂທ">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ອີເມວ</label>
                                <div class="col-9">
                                    <input type="email" name="email" class="form-control" placeholder="ປ້ອນອີເມວ">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ທີ່ຢູ່</label>
                                <div class="col-9">
                                    <input type="text" name="address" class="form-control" placeholder="ປ້ອນທີ່ຢູ່">
                                </div>
                            </div>
                            <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
