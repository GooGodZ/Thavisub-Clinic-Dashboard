@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນທ່ານໝໍ</h1>
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
                <form action="{{ route('doctors.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                                    <div class="col-9">
                                        <input type="text" name="name" class="form-control"
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
                                        <input type="date" name="dob" class="form-control" placeholder="ປ້ອນວັນ">
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
                                            <option value="ຊາຍ">ຊາຍ</option>
                                            <option value="ຍິງ">ຍິງ</option>
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
                                        <input type="text" name="address" class="form-control" placeholder="ປ້ອນທີ່ຢູ່">
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
                                            <option selected>ເລືອກສະຖານະ</option>
                                            <option value="0">ບໍ່ປະຈຳການ</option>
                                            <option value="1">ປະຈຳການ</option>
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
