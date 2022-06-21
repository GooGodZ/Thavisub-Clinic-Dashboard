@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມແກ້ໄຂຂໍ້ມູນຄົນເຈັບ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('patients.index') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('patients.update', $patients->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                            <div class="col-9">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('patients', $patients->name ?? null) }}"
                                    placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">ວັນ ເດືອນ ປີເກິດ</label>
                            <div class="col-9">
                                <input type="date" name="dob"
                                    value="{{ old('patients', date('d-M-Y', strtotime($patients->dob)) ?? null) }}"
                                    class="form-control" placeholder="ປ້ອນວັນ">
                                @error('dob')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
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
                                @error('gender')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                            <div class="col-9">
                                <input type="number" name="tel" class="form-control"
                                    value="{{ old('patients', $patients->tel ?? null) }}" placeholder="ປ້ອນເບີໂທຕິດຕໍ່">
                                @error('tel')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
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
