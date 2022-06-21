@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນວາງຢາ</h1>
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
                            <td>ວັນທີຜົນກວດ</td>
                            <td>ສະຖານະ</td>
                            <td>ສະແດງຂໍ້ມູນ</td>
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
                                    <td class="table-english">{{ date('d-M-Y', strtotime($evaluations->date)) }}</td>
                                    <td class="table-english">
                                        {{ $evaluations->status == 1 ? 'ວາງຢາແລ້ວ' : 'ລໍຖ້າວາງຢາ' }}</td>
                                    <td>
                                        <form action="{{ route('evaluations.destroy', $evaluations->id) }}"
                                            method="POST">
                                            <a href="{{ route('medicates.show', $evaluations->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ສະແດງລາຍການຢາ">
                                                <i class="fa-regular fa-file-lines"></i>
                                            </a>
                                            <a href="{{ route('medicatesCreateLink', $evaluations->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ເພີ່ມວາງຢາ">
                                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                            </a>
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
