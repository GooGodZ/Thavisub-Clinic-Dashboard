@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນຜູ້ສະໝອງ</p>
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
                        <a href="{{ route('suppliers.create') }}">
                            <button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                        </a>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດຜູ້ສະໝອງ</td>
                                <td>ຊື່ຜູ້ສະໝອງ</td>
                                <td>ເບີໂທຕິດຕໍ່</td>
                                <td>ອີເມວ</td>
                                <td>ທີ່ຢູ່</td>
                                <td>ຕົວເລືອກ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($suppliers as $suppliers)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $suppliers->sup_no }}</td>
                                        <td>{{ $suppliers->name }}</td>
                                        <td class="table-english">{{ $suppliers->tel }}</td>
                                        <td class="table-english">{{ $suppliers->email }}</td>
                                        <td>{{ $suppliers->address }}</td>
                                        <td>
                                            <form action="{{ route('suppliers.destroy', $suppliers->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('suppliers.edit', $suppliers->id) }}">
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
