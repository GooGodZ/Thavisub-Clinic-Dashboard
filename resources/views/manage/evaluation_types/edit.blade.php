@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມແກ້ໄຂຂໍ້ມູນປະເພດຜົນກວດ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('evaluation_types.index') }}"class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('evaluation_types.update', $evaluation_types->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label label-start">ຊື່ປະເພດຜົນກວດ</label>
                                    <div class="col-9">
                                        <input type="text" name="name"
                                            value="{{ old('evaluation_types', $evaluation_types->name ?? null) }}"
                                            class="form-control" placeholder="ປ້ອນຊື່ປະເພດຜົນກວດ">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label label-start">ລາຄາຜົນກວດ</label>
                                    <div class="col-9">
                                        <input type="number" name="price"
                                            value="{{ old('evaluation_types', $evaluation_types->price ?? null) }}"
                                            class="form-control" placeholder="ປ້ອນລາຄາຜົນກວດ">
                                        @error('price')
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
