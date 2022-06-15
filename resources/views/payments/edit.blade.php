@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນການຊຳລະ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('payments.index') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="card-body-content-form">
                        <form action="{{ route('payments.update', $payments->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label class="col-3 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                                <div class="col-9">
                                    <input type="" class="form-control"
                                        value="{{ old('payments', $payments->pay_no.' '.$payments->cases->patients->name) }}"
                                        placeholder="ປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ລວມລາຄາຢາ</label>
                                <div class="col-9">
                                    <input type="number" name="price_p" class="form-control" value="{{ $medicates_sum }}" placeholder="ປ້ອນລວມລາຄາຢາ">
                                    @error('price_p')
                                        <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-3 col-form-label">ລວມລາຄາປິ່ນປົວ</label>
                                <div class="col-9">
                                    <input type="number" name="price_e" class="form-control"
                                        placeholder="ປ້ອນລວມລາຄາປິ່ນປົວ">
                                    @error('price_e')
                                        <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
