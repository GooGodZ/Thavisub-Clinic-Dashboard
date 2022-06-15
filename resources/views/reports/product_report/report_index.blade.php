@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ລາຍງານຈຳນວນສິນຄ້າ</p>
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
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລະຫັດສິນຄ້າ</td>
                                <td>ຊື່ສິນຄ້າ</td>
                                <td>ປະເພດ</td>
                                <td>ຈຳນວນທັງໝົດ</td>
                                <td>ຈຳນວນທີ່ໃຊ້ໄປ</td>
                                <td>ຈຳນວນທີ່ຍັງເຫຼືອ</td>
                            </thead>
                            <tbody>
                                @foreach ($product as $product)
                                    <tr>
                                        <td class="table-english">{{ $product->p_no }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pt_name }}</td>
                                        <td class="table-english">{{ $product->quantity + $product->usequantity }}</td>
                                        <td class="table-english">{{ $product->usequantity }}</td>
                                        <td class="table-english">{{ $product->quantity }}</td>
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
