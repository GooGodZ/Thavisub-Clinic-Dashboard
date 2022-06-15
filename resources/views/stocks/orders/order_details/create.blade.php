@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນວາງຢາ</p>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert-success">
            <span class="close-alert-button" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ redirect()->back()->getTargetUrl() }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="card-body-content-form">
                        <form action="{{ route('order_details.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ໃບສັ່ງຊື້</label>
                                        <div class="col-9">
                                            <select name="or_id" class="form-select search">
                                                <option value="{{ $orders->id }}">
                                                    {{ $orders->or_no . ' ' . $orders->name }}
                                                </option>
                                            </select>
                                            @error('c_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຜູ້ສະໜອງ</label>
                                        <div class="col-9">
                                            <select class="form-select search">
                                                <option value="{{ $orders->id }}">
                                                    {{ $orders->suppliers->name }}
                                                </option>
                                            </select>
                                            @error('c_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ຢາ</label>
                                        <div class="col-9">
                                            <select name="p_id" class="form-select search">
                                                <option selected>ເລືອກຢາ</option>
                                                @foreach ($products as $products)
                                                    <option value="{{ $products->id }}">
                                                        {{ $products->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('p_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຈຳນວນຢາ</label>
                                        <div class="col-9">
                                            <input type="text" name="quantity" class="form-control"
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
                                    <a href="{{ route('orders.index') }}">ໜ້າສັ່ງຊື້</a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ຊື່ຢາ</td>
                                <td>ຈຳນວນ</td>
                                <td>ຕົວເລືອກ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($order_details as $order_details)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $order_details->products->name }}</td>
                                        <td class="table-english">{{ $order_details->quantity }}</td>
                                        <td>
                                            <form action="{{ route('order_details.destroy', $order_details->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
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
        </div>
    </div>
@endsection
