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
                <div class="card-header bg-white">
                    <h3 class="card-title"><i class="fas fa-cash-register"></i></h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#orders" data-toggle="tab">ສັ່ງຊື້ສິນຄ້າ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#buys" data-toggle="tab">ຊື້ສິນຄ້າເຂົ້າ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="orders">
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
                                                <td class="table-english">{{ $number++ }}</td>
                                                <td class="table-english">{{ $orders->or_no }}</td>
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
                                                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                        </a>
                                                        <a href="{{ route('order_DetailsCreateLink', $orders->id) }}"
                                                            class="text-primary text-decoration-none"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ລາຍການສັ່ງສິນຄ້າ">
                                                            <i class="fa-regular fa-file-lines"></i>
                                                        </a>
                                                        <a href="{{ route('orders.show', $orders->id) }}"
                                                            class="text-primary text-decoration-none"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="ພີມໃບບິນສິນຄ້າ" target="_blank">
                                                            <i class="bi bi-printer"></i></i>
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
                        <div class="tab-pane" id="buys">
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
                                                <td class="table-english">{{ $number++ }}</td>
                                                <td class="table-english">{{ $buys->buy_no }}</td>
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
