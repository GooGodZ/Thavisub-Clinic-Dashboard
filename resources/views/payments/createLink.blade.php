@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນການຊຳລະ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('payments.index') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('payments.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                            <div class="col-9">
                                <select name="c_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="{{ $cases->id }}">{{ $cases->c_no }}
                                        {{ $cases->patients->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">ລວມລາຄາຢາ</label>
                            <div class="col-9">
                                <input type="number" name="price_p" class="form-control" value="{{ $medicates_sum }}"
                                    placeholder="ປ້ອນລວມລາຄາຢາ">
                                @error('price_p')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">ລວມລາຄາປິ່ນປົວ</label>
                            <div class="col-9">
                                @foreach ($evaluations as $evaluations)
                                    <input type="number" name="price_e" class="form-control"
                                        value="{{ $evaluations->price }}" placeholder="ປ້ອນລວມລາຄາປິ່ນປົວ">
                                @endforeach
                                @error('price_e')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
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
