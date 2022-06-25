@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານຈຳນວນສິນຄ້າ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລະຫັດສິນຄ້າ</td>
                            <td>ຊື່ສິນຄ້າ</td>
                            <td>ປະເພດ</td>
                            <td>ຈຳນວນທີ່ໃຊ້ໄປ</td>
                            <td>ຈຳນວນທີ່ຍັງເຫຼືອ</td>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                                <tr>
                                    <td>{{ $product->p_no }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pt_name }}</td>
                                    @if ($product->usequantity != null)
                                        <td>{{ number_format($product->usequantity) }}</td>
                                    @else
                                        <td>{{ 0 }}</td>
                                    @endif
                                    <td>{{ $product->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
