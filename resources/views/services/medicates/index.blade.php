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
                <div class="card-header bg-white">
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#medicatestoday" data-toggle="tab">ວາງຢາແລ້ວ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="medicatestoday">
                            <div class="card-body">
                                <table id="mytable" class="table table-hover" width="100%">
                                    <thead>
                                        <td>ລຳດັບ</td>
                                        <td>ລະຫັດຜົນກວດ</td>
                                        <td>ຊື່ຄົນເຈັບ</td>
                                        <td>ວັນທີຜົນກວດ</td>
                                        <td>ສະຖານະ</td>
                                        <td>Action</td>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($cases as $cases)
                                            <tr>
                                                <td>{{ $number++ }}</td>
                                                <td>{{ $cases->c_no }}</td>
                                                <td>{{ $cases->patients->name }}</td>
                                                <td>{{ date('d-M-Y', strtotime($cases->date)) }}</td>
                                                <td>
                                                    {{ $cases->status !== 0 && $cases->status !== 1 ? 'ວາງຢາແລ້ວ' : 'ລໍຖ້າວາງຢາ' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('medicates.show', $cases->id) }}"
                                                        class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="ສະແດງລາຍການ">
                                                        <i class="fa-regular fa-file-lines"></i>
                                                    </a>
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
