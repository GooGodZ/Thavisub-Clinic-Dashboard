@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມແກ້ໄຂຂໍ້ມູນທ່ານໝໍ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('doctors.index') }}">
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
                        <form action="{{ route('doctors.update', $doctors->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                                <div class="col-9">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('doctors', $doctors->name ?? null) }}"
                                        placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <label class="col-3 col-form-label">ວັນ ເດືອນ ປີເກິດ</label>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="day"
                                                value="{{ old('doctors', date('d', strtotime($doctors->dob)) ?? null) }}"
                                                class="form-control" placeholder="ປ້ອນວັນ">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="month"
                                                value="{{ old('doctors', date('m', strtotime($doctors->dob)) ?? null) }}"
                                                class="form-control" placeholder="ປ້ອນເດືອນ">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="year"
                                                value="{{ old('doctors', date('Y', strtotime($doctors->dob)) ?? null) }}"
                                                class="form-control" placeholder="ປ້ອນປີເກິດ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ທີ່ຢູ່</label>
                                <div class="col-9">
                                    <input type="text" name="address" class="form-control"
                                        value="{{ old('doctors', $doctors->address ?? null) }}" placeholder="ປ້ອນທີ່ຢູ່">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                                <div class="col-9">
                                    <input type="text" name="tel" class="form-control"
                                        value="{{ old('doctors', $doctors->tel ?? null) }}"
                                        placeholder="ປ້ອນເບີໂທຕິດຕໍ່">
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
