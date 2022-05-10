@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນສິນຄ້າ</p>
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
                        <a href="{{ route('products.create') }}">
                            <button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                        </a>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດສິນຄ້າ</td>
                                <td>ຊື່ສິນຄ້າ</td>
                                <td>ປະເພດສິນຄ້າ</td>
                                <td>ຈຳນວນສິນຄ້າ</td>
                                <td>ລາຄາສິນຄ້າ</td>
                                <td>ເພີ່ມເຕີມ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($products as $products)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $products->p_no }}</td>
                                        <td>{{ $products->name }}</td>
                                        <td>{{ $products->product_types->name }}</td>
                                        <td class="table-english">{{ $products->quantity }}</td>
                                        <td class="table-english">{{ $products->price }}</td>
                                        <td>
                                            <form action="{{ route('products.destroy', $products->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('products.edit', $products->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
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
