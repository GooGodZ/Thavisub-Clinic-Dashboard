@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນນັດກວດ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('appointments.index') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('appointments.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                    <div class="col-9">
                                        <select name="c_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="" {{ old('c_id') == '' ? 'selected' : '' }}>ເລືອກຄົນເຈັບ
                                            </option>
                                            @foreach ($cases as $cases)
                                                <option value="{{ $cases->id }}"
                                                    {{ old('c_id') == $cases->id ? 'selected' : '' }}>
                                                    {{ $cases->c_no . ' ' . $cases->patients->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('c_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ທ່ານໝໍທີ່ນັດ</label>
                                    <div class="col-9">
                                        <select name="doc_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="" {{ old('doc_id') == '' ? 'selected' : '' }}>
                                                ເລືອກທ່ານໝໍທີ່ນັດ</option>
                                            @foreach ($doctors as $doctors)
                                                <option value="{{ $doctors->id }}"
                                                    {{ old('doc_id') == $doctors->id ? 'selected' : '' }}>
                                                    {{ $doctors->doc_no . ' ' . $doctors->name }}</option>
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
                                    <label class="col-3 col-form-label">ວັນທີ ເດືອນ ປີນັດ</label>
                                    <div class="col-9">
                                        <input type="date" name="date" class="form-control"
                                            value="{{ old('date') }}" placeholder="ປ້ອນວັນທີ ເດືອນ ປີນັດ">
                                        @error('date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ເວລານັດ</label>
                                    <div class="col-9">
                                        <select name="time" class="form-select">
                                            <option value="" {{ old('time') == '' ? 'selected' : '' }}>ເວລານັດ
                                            </option>
                                            <option value="16:30" {{ old('time') == '16:30' ? 'selected' : '' }}>16:30
                                            </option>
                                            <option value="17:00" {{ old('time') == '17:00' ? 'selected' : '' }}>17:00
                                            </option>
                                            <option value="17:30" {{ old('time') == '17:30' ? 'selected' : '' }}>17:30
                                            </option>
                                            <option value="18:00" {{ old('time') == '18:00' ? 'selected' : '' }}>18:00
                                            </option>
                                            <option value="18:30" {{ old('time') == '18:30' ? 'selected' : '' }}>18:30
                                            </option>
                                            <option value="19:00" {{ old('time') == '19:00' ? 'selected' : '' }}>19:00
                                            </option>
                                            <option value="19:30" {{ old('time') == '19:30' ? 'selected' : '' }}>19:30
                                            </option>
                                            <option value="20:00" {{ old('time') == '20:00' ? 'selected' : '' }}>20:00
                                            </option>
                                        </select>
                                        @error('time')
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
