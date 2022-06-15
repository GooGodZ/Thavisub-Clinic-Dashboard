@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນການສັ່ງຊື້ສິນຄ້າ</p>
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
                        <a href="{{ route('orders.create') }}">
                            <button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                        </a>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດສັ່ງຊື້</td>
                                <td>ຊື່ໃບສັ່ງຊື້</td>
                                <td>ຈາກຜູ້ສະໜອງ</td>
                                <td>ສະຖານະ</td>
                                <td>ຕົວເລືອກ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($orders as $orders)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $orders->or_no }}</td>
                                        <td>{{ $orders->name }}</td>
                                        <td>{{ $orders->suppliers->name }}</td>
                                        <td>{{ $orders->status == 0 ? 'ລໍຖ້າສິນຄ້າ' : 'ສິນຄ້າມາແລ້ວ' }}</td>
                                        <td>
                                            <form action="{{ route('orders.destroy', $orders->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('orders.edit', $orders->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('buysCreateLink', $orders->id) }}">
                                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                </a>
                                                <a href="{{ route('order_DetailsCreateLink', $orders->id) }}"">
                                                    <i class="fa-regular fa-file-lines"></i>
                                                </a>
                                                <a href="{{ route('orders.show', $orders->id) }}"
                                                    target="_blank">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
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

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນການຊື້ສິນຄ້າເຂົ້າ</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-table">
                        <table id="mytable2" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດຊື້ເຂົ້າ</td>
                                <td>ຊື່ໃບສັ່ງຊື້</td>
                                <td>ຈາກຜູ້ສະໜອງ</td>
                                <td>ຕົວເລືອກ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($buys as $buys)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $buys->buy_no }}</td>
                                        <td>{{ $buys->orders->name }}</td>
                                        <td>{{ $buys->orders->suppliers->name }}</td>
                                        <td>
                                            <form action="{{ route('buys.destroy', $buys->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('buys.edit', $buys->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('buy_DetailsCreateLink', $buys->id) }}">
                                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                </a>
                                                <a href="{{ route('buys.show', $buys->id) }}">
                                                    <i class="fa-regular fa-file-lines"></i>
                                                </a>
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
