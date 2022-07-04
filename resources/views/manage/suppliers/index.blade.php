@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນຜູ້ສະໝອງ</h1>
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
                    <a href="{{ route('suppliers.create') }}" class="btn float-end"
                        style="background-color: #28635a; color: white">
                        <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</a>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດຜູ້ສະໝອງ</td>
                            <td>ຊື່ຜູ້ສະໝອງ</td>
                            <td>ເບີໂທຕິດຕໍ່</td>
                            <td>ອີເມວ</td>
                            <td>ທີ່ຢູ່</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($suppliers as $suppliers)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $suppliers->sup_no }}</td>
                                    <td>{{ $suppliers->name }}</td>
                                    <td>{{ $suppliers->tel }}</td>
                                    <td>{{ $suppliers->email }}</td>
                                    <td>{{ $suppliers->address }}</td>
                                    <td>
                                        <form action="{{ route('suppliers.destroy', $suppliers->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('suppliers.edit', $suppliers->id) }}"
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
