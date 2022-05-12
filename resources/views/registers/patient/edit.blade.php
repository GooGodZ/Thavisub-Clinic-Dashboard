@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມແກ້ໄຂຂໍ້ມູນຄົນເຈັບ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('patients.index') }}">
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
                        <form action="{{ route('patients.update', $patients->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                                <div class="col-9">
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('patients', $patients->name ?? null) }}"
                                        placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ວັນ ເດືອນ ປີເກິດ</label>
                                <div class="col-9">
                                    <input type="date" name="dob" class="form-control"
                                        value="{{ old('patients', $patients->dob ?? null) }}"
                                        placeholder="ປ້ອນວັນ ເດືອນ ປີເກິດ">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ເພດ</label>
                                <div class="col-9">
                                    <select name="gender" class="form-select search">
                                        <option selected>ເລືອກເພດ</option>
                                        <option value="ຊາຍ"
                                            {{ old('patients', $patients->gender ?? null) == 'ຊາຍ' ? 'selected' : '' }}>
                                            ຊາຍ</option>
                                        <option value="ຍິງ"
                                            {{ old('patients', $patients->gender ?? null) == 'ຍິງ' ? 'selected' : '' }}>
                                            ຍິງ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                                <div class="col-9">
                                    <input type="number" name="tel" class="form-control"
                                        value="{{ old('patients', $patients->tel ?? null) }}"
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
