@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນການສັ່ງຊື້</h1>
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
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#orders"
                                type="button">ສັ່ງຊື້ສິນຄ້າ</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#buys"
                                type="button">ຊື້ສິນຄ້າເຂົ້າ</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="orders">
                            <div class="card-header" style="background-color: white">
                                <h3 class="card-title">ຂໍ້ມູນການສັ່ງຊື້ສິນຄ້າ</h3>
                                <a href="{{ route('orders.create') }}"class="btn float-end"
                                    style="background-color: #8ebaa8; color: white">
                                    <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="mytable" class="table table-hover" width="100%">
                                    <thead>
                                        <td>ລຳດັບ</td>
                                        <td>ລະຫັດສັ່ງຊື້</td>
                                        <td>ຊື່ໃບສັ່ງຊື້</td>
                                        <td>ຈາກຜູ້ສະໜອງ</td>
                                        <td>ສະຖານະ</td>
                                        <td>Action</td>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($orders as $orders)
                                            <tr>
                                                <td>{{ $number++ }}</td>
                                                <td>{{ $orders->or_no }}</td>
                                                <td>{{ $orders->name }}</td>
                                                <td>{{ $orders->suppliers->name }}</td>
                                                <td>{{ $orders->status == 0 ? 'ລໍຖ້າສິນຄ້າ' : 'ສິນຄ້າມາແລ້ວ' }}</td>
                                                <td>
                                                    <form action="{{ route('orders.destroy', $orders->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('buysCreateLink', $orders->id) }}"
                                                            class="text-primary text-decoration-none"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ເພີ່ມໃບສິນຄ້າເຂົ້າ">
                                                            <i class="bi bi-box-arrow-up-right"></i>
                                                        </a>
                                                        <a href="{{ route('orders.show', $orders->id) }}"
                                                            class="text-primary text-decoration-none"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ພີມໃບບິນສິນຄ້າ" target="_blank">
                                                            <i class="bi bi-printer"></i>
                                                        </a>
                                                        </a>
                                                        <button type="submit" class="bg-transparent border-0 text-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ລົບຂໍ້ມູນ"
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
                        <div class="tab-pane fade" id="buys">
                            <div class="card-header" style="background-color: white">
                                <h3 class="card-title">ຂໍ້ມູນການຊື້ສິນຄ້າເຂົ້າ</h3>
                            </div>
                            <div class="card-body">
                                <table id="mytable2" class="table table-hover" width="100%">
                                    <thead>
                                        <td>ລຳດັບ</td>
                                        <td>ລະຫັດຊື້ເຂົ້າ</td>
                                        <td>ຊື່ໃບສັ່ງຊື້</td>
                                        <td>ຈາກຜູ້ສະໜອງ</td>
                                        <td>Action</td>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($buys as $buys)
                                            <tr>
                                                <td>{{ $number++ }}</td>
                                                <td>{{ $buys->buy_no }}</td>
                                                <td>{{ $buys->orders->name }}</td>
                                                <td>{{ $buys->orders->suppliers->name }}</td>
                                                <td>
                                                    <form action="{{ route('buys.destroy', $buys->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('buy_DetailsCreateLink', $buys->id) }}"
                                                            class="text-primary text-decoration-none"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ລາຍການສິນຄ້າເຂົ້າ">
                                                            <i class="fa-regular fa-file-lines"></i>
                                                        </a>
                                                        <button type="submit" class="bg-transparent border-0 text-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ລົບຂໍ້ມູນ"
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
        </div>
    </section>
@endsection
