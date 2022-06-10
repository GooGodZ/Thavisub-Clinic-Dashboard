@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມແກ້ໄຂຂໍ້ມູນສິນຄ້າ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('products.index') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="card-body-content-form">
                        <form action="{{ route('products.update', $products->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຊື່ສິນຄ້າ</label>
                                        <div class="col-9">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('products', $products->name ?? null) }}"
                                                placeholder="ປ້ອນຊື່ສິນຄ້າ">
                                            @error('name')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ປະເພດສິນຄ້າ</label>
                                        <div class="col-9">
                                            <select name="pt_id" class="form-select search">
                                                <option selected>ເລືອກປະເພດສິນຄ້າ</option>
                                                @foreach ($product_types as $product_types)
                                                    <option value="{{ $product_types->id }}"
                                                        @if (old('product_types') == $product_types->id || $product_types->id == $products->pt_id) selected @endif>
                                                        {{ $product_types->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pt_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ຈຳນວນສິນຄ້າ</label>
                                        <div class="col-9">
                                            <input type="number" name="quantity" class="form-control"
                                                value="{{ old('products', $products->quantity ?? null) }}"
                                                placeholder="ປ້ອນຈຳນວນສິນຄ້າ">
                                            @error('quantity')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ລາຄາສິນຄ້າ</label>
                                        <div class="col-9">
                                            <input type="number" name="price" class="form-control"
                                                value="{{ old('products', $products->price ?? null) }}"
                                                placeholder="ປ້ອນລາຄາສິນຄ້າ">
                                            @error('price')
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
