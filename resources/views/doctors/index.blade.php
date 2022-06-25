@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນທ່ານໝໍ</h1>
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
                    <a href="{{ route('doctors.create') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</a>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດໝໍ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ເບີໂທຕິດຕໍ່</td>
                            <td>ທີ່ຢູ່</td>
                            <td>ສະຖານະ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($doctors as $doctors)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $doctors->doc_no }}</td>
                                    <td>{{ $doctors->name }}</td>
                                    <td>{{ $doctors->tel }}</td>
                                    <td>{{ $doctors->address }}</td>
                                    <td>{{ $doctors->status == 1 ? 'ປະຈຳການ' : 'ບໍ່ປະຈຳການ' }}</td>
                                    <td>
                                        <form action="{{ route('doctors.destroy', $doctors->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('doctors.edit', $doctors->id) }}"
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
