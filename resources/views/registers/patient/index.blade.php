@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນຄົນເຈັບ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('patients.create') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</a>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ອາຍຸ</td>
                            <td>ວັນ ເດືອນ ປີເກີດ</td>
                            <td>ເບີໂທຕິດຕໍ່</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($patients as $patients)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $patients->pt_no }}</td>
                                    <td>{{ $patients->name }}</td>
                                    <td>{{ $patients->getAgeAttribute() }}</td>
                                    <td>{{ date('d-M-Y ', strtotime($patients->dob)) }}</td>
                                    <td>{{ $patients->tel }}</td>
                                    <td>
                                        <form action="{{ route('patients.destroy', $patients->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('patients.edit', $patients->id) }}"
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
