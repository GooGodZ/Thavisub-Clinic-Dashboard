@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມແກ້ໄຂຂໍ້ມູນຜູ້ສະໝອງ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('suppliers.index') }}" class="btn float-end"
                        style="background-color: #28635a; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('suppliers.update', $suppliers->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຜູ້ສະໝອງ</label>
                                    <div class="col-9">
                                        <input type="text" name="name"
                                            value="{{ old('suppliers', $errors->has('name') ? '' : $suppliers->name) }}" class="form-control"
                                            placeholder="ປ້ອນຊື່ຜູ້ສະໝອງ">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ເບີໂທຕິດຕໍ່</label>
                                    <div class="col-9">
                                        <input type="text" name="tel"
                                            value="{{ old('suppliers', $errors->has('tel') ? '' : $suppliers->tel) }}" class="form-control"
                                            placeholder="ປ້ອນເບີໂທ">
                                        @error('tel')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ອີເມວ</label>
                                    <div class="col-9">
                                        <input type="email" name="email"
                                            value="{{ old('suppliers', $errors->has('email') ? '' : $suppliers->email) }}" class="form-control"
                                            placeholder="ປ້ອນອີເມວ">
                                        @error('email')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ທີ່ຢູ່</label>
                                    <div class="col-9">
                                        <input type="text" name="address"
                                            value="{{ old('suppliers', $errors->has('address') ? '' : $suppliers->address) }}"
                                            class="form-control" placeholder="ປ້ອນທີ່ຢູ່">
                                        @error('address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #28635a; color: white">
                                <i class="bi bi-save2"></i>&nbsp;ບັນທືກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
