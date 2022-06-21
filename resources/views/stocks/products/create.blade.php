@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນສິນຄ້າ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('products.index') }}"class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label label-start">ຊື່ສິນຄ້າ</label>
                                    <div class="col-9">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="ປ້ອນຊື່ສິນຄ້າ">
                                        @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label label-start">ປະເພດສິນຄ້າ</label>
                                    <div class="col-9">
                                        <select name="pt_id" class="form-select search">
                                            <option selected>ເລືອກປະເພດສິນຄ້າ</option>
                                            @foreach ($product_types as $product_types)
                                                <option value="{{ $product_types->id }}">{{ $product_types->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pt_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label label-start">ຈຳນວນສິນຄ້າ</label>
                                    <div class="col-9">
                                        <input type="number" name="quantity" class="form-control"
                                            placeholder="ປ້ອນຈຳນວນສິນຄ້າ">
                                        @error('quantity')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label label-start">ລາຄາສິນຄ້າ</label>
                                    <div class="col-9">
                                        <input type="number" name="price" class="form-control"
                                            placeholder="ປ້ອນລາຄາສິນຄ້າ">
                                        @error('price')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #8ebaa8; color: white">
                                <i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
