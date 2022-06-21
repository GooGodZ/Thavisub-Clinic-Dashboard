@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນຜົນກວດ</h1>
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
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດຜົນກວດ</td>
                            <td>ຊື່ຄົນເຈັບ</td>
                            <td>ອາການ</td>
                            <td>ປະເພດຜົນກວດ</td>
                            <td>ລາຍລະອຽດ</td>
                            <td>ວັນທີຜົນກວດ</td>
                            <td>ສະຖານະ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($evaluations as $evaluations)
                                <tr>
                                    <td class="table-english">{{ $number++ }}</td>
                                    <td class="table-english">{{ $evaluations->eva_no }}</td>
                                    <td class="table-english">{{ $evaluations->cases->patients->name }}</td>
                                    <td class="table-english">{{ $evaluations->cases->disea }}</td>
                                    <td class="table-english">{{ $evaluations->evaluation_types->name }}</td>
                                    <td class="table-english">{{ $evaluations->detail }}</td>
                                    <td class="table-english">{{ date('d-M-Y', strtotime($evaluations->date)) }}</td>
                                    <td class="table-english">
                                        {{ $evaluations->status == 0 ? 'ລໍຖ້າວາງຢາ' : 'ວາງຢາແລ້ວ' }}</td>
                                    <td>
                                        <form action="{{ route('evaluations.destroy', $evaluations->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('medicatesCreateLink', $evaluations->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ວາງຢາ">
                                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                            </a>
                                            <a href="{{ route('evaluations.edit', $evaluations->id) }}"
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
