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
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('appointments.update', $appointments->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                    <div class="col-9">
                                        <select name="c_id" class="form-select search">
                                            <option selected>ເລືອກຄົນເຈັບ</option>
                                            @foreach ($cases as $cases)
                                                <option value="{{ $cases->id }}"
                                                    @if (old('cases') == $cases->id || $cases->id == $appointments->c_id) selected @endif>
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
                                        <select name="doc_id" class="form-select search">
                                            <option selected>ເລືອກທ່ານໝໍທີ່ນັດ</option>
                                            @foreach ($doctors as $doctors)
                                                <option value="{{ $doctors->id }}"
                                                    @if (old('doctors') == $doctors->id || $doctors->id == $appointments->c_id) selected @endif>
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
                                        <input type="date" name="date"
                                            value="{{ old('appointments', $appointments->date ?? null) }}"
                                            class="form-control" placeholder="ປ້ອນວັນທີ ເດືອນ ປີນັດ">
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
                                        <select name="time" class="form-select search">
                                            <option selected>ເວລານັດ</option>
                                            <option value="16:30"
                                                {{ old('appointments', $appointments->time ?? null) == '16:30' ? 'selected' : '' }}>
                                                16:30</option>
                                            <option value="17:00"
                                                {{ old('appointments', $appointments->time ?? null) == '17:00' ? 'selected' : '' }}>
                                                17:00</option>
                                            <option value="17:30"
                                                {{ old('appointments', $appointments->time ?? null) == '17:30' ? 'selected' : '' }}>
                                                17:30</option>
                                            <option value="18:00"
                                                {{ old('appointments', $appointments->time ?? null) == '18:00' ? 'selected' : '' }}>
                                                18:00</option>
                                            <option value="18:30"
                                                {{ old('appointments', $appointments->time ?? null) == '18:30' ? 'selected' : '' }}>
                                                18:30</option>
                                            <option value="19:00"
                                                {{ old('appointments', $appointments->time ?? null) == '19:00' ? 'selected' : '' }}>
                                                19:00</option>
                                            <option value="19:30"
                                                {{ old('appointments', $appointments->time ?? null) == '19:30' ? 'selected' : '' }}>
                                                19:30</option>
                                            <option value="20:00"
                                                {{ old('appointments', $appointments->time ?? null) == '20:00' ? 'selected' : '' }}>
                                                20:00</option>
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
                                <i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
