@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມແກ້ໄຂຂໍ້ມູນຜົນກວດ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('medicates.index') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="card-body-content-form">
                        <form action="{{ route('medicates.update', $medicates->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                        <div class="col-9">
                                            <select name="c_id" class="form-select search">
                                                <option selected>ເລືອກຄົນເຈັບ</option>
                                                @foreach ($cases as $cases)
                                                    <option value="{{ $cases->id }}"
                                                        @if (old('cases') == $cases->id || $cases->id == $medicates->c_id) selected @endif>
                                                        {{ $cases->c_no . ' ' . $cases->patients->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('c_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ຢາ</label>
                                        <div class="col-9">
                                            <select name="p_id" class="form-select search">
                                                <option selected>ເລືອກຢາ</option>
                                                @foreach ($products as $products)
                                                    <option value="{{ $products->id }}"
                                                        @if (old('products') == $products->id || $products->id == $medicates->p_id) selected @endif>
                                                        {{ $products->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('p_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ລາຍລະອຽດຜົນກວດ</label>
                                        <div class="col-9">
                                            <input type="text" name="quantity" class="form-control"
                                                value="{{ old('medicates', $medicates->quantity ?? null) }}"
                                                placeholder="ປ້ອນຈຳນວນຢາ">
                                            @error('quantity')
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
