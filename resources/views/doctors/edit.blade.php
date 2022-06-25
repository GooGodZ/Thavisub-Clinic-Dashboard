@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມແກ້ໄຂຂໍ້ມູນທ່ານໝໍ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('doctors.index') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('doctors.update', $doctors->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                                    <div class="col-9">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('doctors', $doctors->name ?? null) }}"
                                            placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ວັນ ເດືອນ ປີເກິດ</label>
                                    <div class="col-9">
                                        <input type="date" name="dob"
                                            value="{{ old('doctors', date('d-M-Y', strtotime($doctors->dob)) ?? null) }}"
                                            class="form-control" placeholder="ປ້ອນວັນ">
                                        @error('dob')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ເພດ</label>
                                    <div class="col-9">
                                        <select name="gender" class="form-select search">
                                            <option selected>ເລືອກເພດ</option>
                                            <option value="ຊາຍ"
                                                {{ old('doctors', $doctors->gender ?? null) == 'ຊາຍ' ? 'selected' : '' }}>
                                                ຊາຍ</option>
                                            <option value="ຍິງ"
                                                {{ old('doctors', $doctors->gender ?? null) == 'ຍິງ' ? 'selected' : '' }}>
                                                ຍິງ</option>
                                        </select>
                                        @error('gender')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ທີ່ຢູ່</label>
                                    <div class="col-9">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('doctors', $doctors->address ?? null) }}"
                                            placeholder="ປ້ອນທີ່ຢູ່">
                                        @error('address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                                    <div class="col-9">
                                        <input type="text" name="tel" class="form-control"
                                            value="{{ old('doctors', $doctors->tel ?? null) }}"
                                            placeholder="ປ້ອນເບີໂທຕິດຕໍ່">
                                        @error('tel')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ສະຖານະ</label>
                                    <div class="col-9">
                                        <select name="status" class="form-select search">
                                            <option value="0"
                                                {{ old('doctors', $doctors->status ?? null) == 0 ? 'selected' : '' }}>
                                                ບໍ່ປະຈຳການ</option>
                                            <option value="1"
                                                {{ old('doctors', $doctors->status ?? null) == 1 ? 'selected' : '' }}>
                                                ປະຈຳການ
                                            </option>
                                        </select>
                                        @error('status')
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
