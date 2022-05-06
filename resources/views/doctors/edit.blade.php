@extends('home_master')

@section('contents')
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຂໍ້ມູນທ່ານໝໍ</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <div class="card-body-content-button">
                    <a href="{{ route('doctors.index') }}"><button><i class="fa-solid fa-backward"></i>&nbsp;ກັບໄປຂໍ້ມູນທ່ານໝໍ</button></a>
                </div>
                @if($errors->any())
                <ul class="errors">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card-body-content-form">
                    <form action="{{ route('doctors.update',$doctors->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                            <div class="col-9">
                                <input type="text" name="name" class="form-control" value="{{ old('doctors', $doctors->name ?? null) }}" placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-3 col-form-label">ວັນ ເດືອນ ປີເກິດ</label>
                            <div class="col-9">
                                <input type="date" name="dob" class="form-control" value="{{ old('doctors', $doctors->dob ?? null) }}" placeholder="ປ້ອນວັນ ເດືອນ ປີເກິດ">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-3 col-form-label">ເພດ</label>
                            <div class="col-9">
                                <select name="gender" class="form-select">
                                    <option selected>ເລືອກເພດ</option>
                                    <option value="ຊາຍ" {{ ((old('doctors',$doctors->gender ?? null) == 'ຊາຍ')) ? "selected" : "" }}>ຊາຍ</option>
                                    <option value="ຍິງ" {{ ((old('doctors',$doctors->gender ?? null) == 'ຍິງ')) ? "selected" : "" }}>ຍິງ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-3 col-form-label">ທີ່ຢູ່</label>
                            <div class="col-9">
                                <input type="text" name="address" class="form-control" value="{{ old('doctors', $doctors->address ?? null) }}" placeholder="ປ້ອນທີ່ຢູ່">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                            <div class="col-9">
                                <input type="text" name="tel" class="form-control" value="{{ old('doctors', $doctors->tel ?? null) }}" placeholder="ປ້ອນເບີໂທຕິດຕໍ່">
                            </div>
                        </div>
                        <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກຄົນເຈັບ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
