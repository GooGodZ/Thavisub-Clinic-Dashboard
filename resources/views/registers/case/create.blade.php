@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນລົງທະບຽນກວດ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('cases.index') }}">
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
                        <form action="{{ route('cases.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຊື່ຄົນເຈັບ</label>
                                        <div class="col-9">
                                            <select name="pt_id" class="form-select search">
                                                <option selected>ເລືອກຄົນເຈັບ</option>
                                                @foreach ($patients as $patients)
                                                    <option value="{{ $patients->id }}">{{ $patients->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຊື່ທ່ານໝໍ</label>
                                        <div class="col-9">
                                            <select name="doc_id" class="form-select search">
                                                <option selected>ເລືອກທ່ານໝໍ</option>
                                                @foreach ($doctors as $doctors)
                                                    <option value="{{ $doctors->id }}">{{ $doctors->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຄວາມດັນ</label>
                                        <div class="col">
                                            <input type="text" name="pressure1" class="form-control"
                                                placeholder="ປ້ອນຄວາມດັນ">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="pressure2" class="form-control"
                                                placeholder="ປ້ອນຄວາມດັນ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ອຸນຫະພູມ</label>
                                        <div class="col-9">
                                            <input type="text" name="temper" class="form-control"
                                                placeholder="ປ້ອນອຸນຫະພູມ (ອົງສາ °C)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ທາງເດີນຫາຍໃຈ</label>
                                        <div class="col-9">
                                            <input type="text" name="respira" class="form-control"
                                                placeholder="ປ້ອນທາງເດີນຫາຍໃຈ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຊີບພະຈອນ</label>
                                        <div class="col-9">
                                            <input type="text" name="pulse" class="form-control"
                                                placeholder="ປ້ອນຊີບພະຈອນ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ອາການ</label>
                                        <div class="col-9">
                                            <input type="text" name="disea" class="form-control" placeholder="ປ້ອນອາການ">
                                        </div>
                                    </div>
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
