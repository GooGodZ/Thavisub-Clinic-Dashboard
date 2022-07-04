@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນສິນຄ້າ</h1>
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
                    <a href="{{ route('products.create') }}"class="btn float-end"
                        style="background-color: #28635a; color: white">
                        <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ
                    </a>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດສິນຄ້າ</td>
                            <td>ຊື່ສິນຄ້າ</td>
                            <td>ປະເພດສິນຄ້າ</td>
                            <td>ຈຳນວນສິນຄ້າ</td>
                            <td>ລາຄາສິນຄ້າ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($products as $products)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $products->p_no }}</td>
                                    <td>{{ $products->name }}</td>
                                    <td>{{ $products->product_types->name }}</td>
                                    <td>{{ $products->quantity }}</td>
                                    <td>{{ number_format($products->price) }} ກີບ</td>
                                    <td>
                                        <form action="{{ route('products.destroy', $products->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('products.edit', $products->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ແກ້ໄຂຂໍ້ມູນ">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
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
