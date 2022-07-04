@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນການສັ່ງຊື້ສິນຄ້າ</h1>
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ redirect()->back()->getTargetUrl() }}"class="btn float-end"
                        style="background-color: #28635a; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('order_details.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ໃບສັ່ງຊື້</label>
                                    <div class="col-9">
                                        <select name="or_id" class="form-select">
                                            <option value="{{ $orders->id }}">
                                                {{ $orders->or_no . ' ' . $orders->name }}
                                            </option>
                                        </select>
                                        @error('c_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຜູ້ສະໜອງ</label>
                                    <div class="col-9">
                                        <select class="form-select">
                                            <option value="{{ $orders->id }}">
                                                {{ $orders->suppliers->name }}
                                            </option>
                                        </select>
                                        @error('c_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຢາ</label>
                                    <div class="col-9">
                                        <select name="p_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="" {{ old('p_id') == '' ? 'selected' : '' }}>ເລືອກຢາ
                                            </option>
                                            @foreach ($products as $products)
                                                <option value="{{ $products->id }}"
                                                    {{ old('p_id') == $products->id ? 'selected' : '' }}>
                                                    {{ $products->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('p_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຈຳນວນຢາ</label>
                                    <div class="col-9">
                                        <input type="text" name="quantity" class="form-control"
                                            value="{{ old('quantity') }}" placeholder="ປ້ອນຈຳນວນຢາ">
                                        @error('quantity')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #28635a; color: white">
                                <i class="bi bi-save2"></i>&nbsp;ບັນທືກ</button>
                            <a href="{{ route('orders.index') }}" class="btn"
                                style="background-color: #28635a; color: white">ໜ້າສັ່ງຊື້ສິນຄ້າ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="card-title">ລາຍການສັ່ງຊື້ສິນຄ້າ</h3>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ຊື່ຢາ</td>
                            <td>ຈຳນວນ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($order_details as $order_details)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $order_details->products->name }}</td>
                                    <td>{{ $order_details->quantity }}</td>
                                    <td>
                                        <form action="{{ route('order_details.destroy', $order_details->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-transparent border-0 text-danger delete-confirm"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="ລົບຂໍ້ມູນ">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
