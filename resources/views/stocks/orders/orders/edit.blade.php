@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນສິນຄ້າ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('orders.index') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="card-body-content-form">
                        <form action="{{ route('orders.update', $orders->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຊື່ໃບສັ່ງຊື້</label>
                                        <div class="col-9">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('orders', $orders->name ?? null) }}"
                                                placeholder="ປ້ອນຊື່ໃບສັ່ງຊື້">
                                            @error('name')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຜູ້ສະໜອງ</label>
                                        <div class="col-9">
                                            <select name="sup_id" class="form-select search">
                                                <option selected>ເລືອກຜູ້ສະໜອງ</option>
                                                @foreach ($suppliers as $suppliers)
                                                    <option value="{{ $suppliers->id }}"
                                                        @if (old('suppliers') == $suppliers->id || $suppliers->id == $orders->sup_id) selected @endif>
                                                        {{ $suppliers->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sup_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
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
