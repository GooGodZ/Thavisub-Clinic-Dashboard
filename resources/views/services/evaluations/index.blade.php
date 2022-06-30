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
                <div class="card-header bg-white">
                    <h3 class="card-title" style="color: #28635a">ລໍຖ້າວາງຢາ</h3>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດຟອມກວດ</td>
                            <td>ຊື່ຄົນເຈັບ</td>
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
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $cases->c_no }}</td>
                                    <td>{{ $cases->patients->name }}</td>
                                    <td>{{ $cases->disea }}</td>
                                    <td>
                                        {{ $cases->status == 1 ? 'ລໍຖ້າວາງຢາ' : 'ວາງຢາແລ້ວ' }}</td>
                                    <td>
                                        <a href="{{ route('medicatesCreateLink', $cases->id) }}"
                                            class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="ວາງຢາ">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
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
