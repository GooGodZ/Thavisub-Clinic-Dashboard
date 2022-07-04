@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນປະເພດຜົນກວດ</h1>
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
                    <a href="{{ route('evaluation_types.create') }}"class="btn float-end"
                        style="background-color: #28635a; color: white">
                        <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ
                    </a>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດປະເພດຜົນກວດ</td>
                            <td>ຊື່ປະເພດຜົນກວດ</td>
                            <td>ລາຄາຜົນກວດ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($evaluation_types as $evaluation_types)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $evaluation_types->et_no }}</td>
                                    <td>{{ $evaluation_types->name }}</td>
                                    <td>{{ number_format($evaluation_types->price) }} ກີບ</td>
                                    <td>
                                        <form action="{{ route('evaluation_types.destroy', $evaluation_types->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('evaluation_types.edit', $evaluation_types->id) }}"
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
