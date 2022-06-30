@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນລົງທະບຽນກວດ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('cases.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                    <div class="col-9">
                                        <select name="pt_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="{{ $patients->id }}">{{ $patients->pt_no }}
                                                {{ $patients->name }}</option>
                                        </select>
                                        @error('pt_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ທ່ານໝໍ</label>
                                    <div class="col-9">
                                        <select name="doc_id" class="form-control selectpicker" data-live-search="true">
                                            <option selected>ເລືອກທ່ານໝໍ</option>
                                            @foreach ($doctors as $doctors)
                                                <option value="{{ $doctors->id }}">{{ $doctors->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('doc_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຄວາມດັນ</label>
                                    <div class="col">
                                        <input type="text" name="pressure1" class="form-control"
                                            placeholder="ປ້ອນຄວາມດັນ">
                                        @error('pressure1')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" name="pressure2" class="form-control"
                                            placeholder="ປ້ອນຄວາມດັນ">
                                        @error('pressure2')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ອຸນຫະພູມ</label>
                                    <div class="col-9">
                                        <input type="text" name="temper" class="form-control"
                                            placeholder="ປ້ອນອຸນຫະພູມ (ອົງສາ °C)">
                                        @error('temper')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ອັດຕາການຫາຍໃຈ</label>
                                    <div class="col-9">
                                        <input type="text" name="respira" class="form-control"
                                            placeholder="ປ້ອນອັດຕາການຫາຍໃຈ">
                                        @error('respira')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊີບພະຈອນ</label>
                                    <div class="col-9">
                                        <input type="text" name="pulse" class="form-control"
                                            placeholder="ປ້ອນຊີບພະຈອນ">
                                        @error('pulse')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ອາການ</label>
                                    <div class="col-9">
                                        <textarea type="text" name="disea" class="form-control" placeholder="ປ້ອນອາການ" rows="3"></textarea>
                                        @error('disea')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #8ebaa8; color: white">
                                <i class="bi bi-save2"></i>&nbsp;ບັນທືກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
