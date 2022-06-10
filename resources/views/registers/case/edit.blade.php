@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມແກ້ໄຂຂໍ້ມູນລົງທະບຽນກວດ</p>
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
                    <div class="card-body-content-form">
                        <form action="{{ route('cases.update', $cases->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຊື່ຄົນເຈັບ</label>
                                        <div class="col-9">
                                            <select name="pt_id" class="form-select search">
                                                <option selected>ເລືອກຄົນເຈັບ</option>
                                                @foreach ($patients as $patients)
                                                    <option value="{{ $patients->id }}"
                                                        @if (old('patients') == $patients->id || $patients->id == $cases->pt_id) selected @endif>
                                                        {{ $patients->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('pt_id')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
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
                                                    <option value="{{ $doctors->id }}"
                                                        @if (old('doctors') == $doctors->id || $doctors->id == $cases->doc_id) selected @endif>
                                                        {{ $doctors->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('doc_id')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຄວາມດັນ</label>
                                        <div class="col">
                                            <input type="text" name="pressure1"
                                                value="{{ old('cases', Str::substr($cases->pressure, 0, 3) ?? null) }}"
                                                class="form-control" placeholder="ປ້ອນຄວາມດັນ">
                                            @error('pressure1')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" name="pressure2"
                                                value="{{ old('cases', Str::substr($cases->pressure, 5, 8) ?? null) }}"
                                                class="form-control" placeholder="ປ້ອນຄວາມດັນ">
                                            @error('pressure2')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ອຸນຫະພູມ</label>
                                        <div class="col-9">
                                            <input type="text" name="temper"
                                                value="{{ old('cases', $cases->temper ?? null) }}" class="form-control"
                                                placeholder="ປ້ອນອຸນຫະພູມ (ອົງສາ °C)">
                                            @error('temper')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ທາງເດີນຫາຍໃຈ</label>
                                        <div class="col-9">
                                            <input type="text" name="respira"
                                                value="{{ old('cases', $cases->respira ?? null) }}"
                                                class="form-control" placeholder="ປ້ອນທາງເດີນຫາຍໃຈ">
                                            @error('respira')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຊີບພະຈອນ</label>
                                        <div class="col-9">
                                            <input type="text" name="pulse"
                                                value="{{ old('cases', $cases->pulse ?? null) }}" class="form-control"
                                                placeholder="ປ້ອນຊີບພະຈອນ">
                                            @error('pulse')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ອາການ</label>
                                        <div class="col-9">
                                            <input type="text" name="disea"
                                                value="{{ old('cases', $cases->disea ?? null) }}" class="form-control"
                                                placeholder="ປ້ອນອາການ">
                                            @error('disea')
                                                <strong style="color: red; text-alig: start">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
