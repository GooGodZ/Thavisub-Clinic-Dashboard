@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນການຊື້ສິນຄ້າເຂົ້າ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ redirect()->back()->getTargetUrl() }}"class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('buy_details.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ໃບສັ່ງຊື້</label>
                                    <div class="col-9">
                                        <select name="buy_id" class="form-select">
                                            <option value="{{ $buys->id }}">
                                                {{ $buys->buy_no . ' ' . $buys->orders->name }}
                                            </option>
                                        </select>
                                        @error('buy_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຢາ</label>
                                    <div class="col-9">
                                        <select name="p_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="" {{ old('p_id') == '' ? 'selected' : '' }}>ເລືອກຢາ
                                            </option>
                                            @foreach ($order_details as $order_details)
                                                <option value="{{ $order_details->p_id }}"
                                                    {{ old('p_id') == $order_details->p_id ? 'selected' : '' }}>
                                                    {{ $order_details->products->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('p_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ລາຄາຢາ</label>
                                    <div class="col-9">
                                        <input type="text" name="price" class="form-control"
                                            value="{{ old('price') }}" placeholder="ປ້ອນລາຄາຢາ">
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
                            <a href="{{ route('orders.index') }}" class="btn"
                                style="background-color: #8ebaa8; color: white">ໜ້າສັ່ງຊື້ສິນຄ້າ</a>
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
                            <td>ລາຄາ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($buy_details as $buy_details)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $buy_details->products->name }}</td>
                                    <td>{{ number_format($buy_details->quantity) }}</td>
                                    <td>{{ number_format($buy_details->price) }} ກີບ</td>
                                    <td>
                                        <form action="{{ route('buy_details.destroy', $buy_details->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-transparent border-0 text-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="ລົບຂໍ້ມູນ"
                                                onclick="return confirm('ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ?')">
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
