@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນລົງທະບຽນກວດ</h1>
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
                    <a href="{{ route('cases.create') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</a>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດຟອມກວດ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ຄວາມດັນ</td>
                            <td>ອຸນຫະພູມ</td>
                            <td>ອັດຕາການຫາຍໃຈ</td>
                            <td>ຊີບພະຈອນ</td>
                            <td>ອາການ</td>
                            <td>ສະຖານະ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($cases as $cases)
                                <tr>
                                    <td class="table-english">{{ $number++ }}</td>
                                    <td class="table-english">{{ $cases->c_no }}</td>
                                    <td>{{ $cases->patients->name }}</td>
                                    <td class="table-english">{{ $cases->pressure }} mmHg</td>
                                    <td class="table-english">{{ $cases->temper }} °C</td>
                                    <td class="table-english">{{ $cases->respira }} bpm</td>
                                    <td class="table-english">{{ $cases->pulse }} bpm</td>
                                    <td>{{ $cases->disea }}</td>
                                    <td>{{ $cases->status == 0 ? 'ລໍຖ້າຜົນກວດ' : 'ກວດແລ້ວ' }}</td>
                                    <td>
                                        <form action="{{ route('cases.destroy', $cases->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('evaluationsCreateLink', $cases->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ອອກຜົນກວດ">
                                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                            </a>
                                            <a href="{{ route('cases.edit', $cases->id) }}"
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
