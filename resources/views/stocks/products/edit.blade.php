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
                    @if ($errors->any())
                        <ul class="errors">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label label-start">ປະເພດສິນຄ້າ</label>
                                        <div class="col-9">
                                            <select name="pt_id" class="form-select">
                                                <option selected>ເລືອກປະເພດສິນຄ້າ</option>
                                                @foreach ($product_types as $product_types)
                                                    <option value="{{ $product_types->id }}"
                                                        @if (old('product_types') == $product_types->id || $product_types->id == $products->pt_id) selected @endif>
                                                        {{ $product_types->name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
