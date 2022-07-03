@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນຜົນກວດ</h1>
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
                    <a href="{{ route('evaluations.index') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ໜ້າຜົນກວດ
                    </a>
                </div>
                <form action="{{ route('evaluations.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                    <div class="col-9">
                                        <select name="c_id" class="form-select">
                                            <option value="{{ $cases->id }}">
                                                {{ $cases->c_no . ' ' . $cases->patients->name }}</option>
                                        </select>
                                        @error('c_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ປະເພດຜົນກວດ</label>
                                    <div class="col-9">
                                        <select name="et_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="" {{ old('et_id') == '' ? 'selected' : '' }}>
                                                ເລືອກປະເພດຜົນກວດ</option>
                                            @foreach ($evaluation_types as $evaluation_types)
                                                <option value="{{ $evaluation_types->id }}"
                                                    {{ old('et_id') == $evaluation_types->id ? 'selected' : '' }}>
                                                    {{ $evaluation_types->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('et_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ລາຍລະອຽດຜົນກວດ</label>
                                    <div class="col-9">
                                        <textarea type="text" name="detail" class="form-control" placeholder="ປ້ອນລາຍລະອຽດຜົນກວດ" rows="5">{{ old('detail') }}</textarea>
                                        @error('detail')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #8ebaa8; color: white">
                                <i class="bi bi-save2"></i>&nbsp;ບັນທືກ</button>
                            <a href="{{ route('medicatesCreateLink', $cases->id) }}" class="btn"
                                style="background-color: #8ebaa8; color: white">ວາງຢາ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ຊື່ປະເພດຜົນກວດ</td>
                            <td>ອາການ</td>
                            <td>ລາຍລະອຽດ</td>
                            <td>ລາຄາ</td>
                            <td>ວັນທີຜົນກວດ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($evaluations as $evaluations)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $evaluations->evaluation_types->name }}</td>
                                    <td>{{ $evaluations->cases->disea }}</td>
                                    <td>{{ $evaluations->detail }}</td>
                                    <td>{{ number_format($evaluations->evaluation_types->price) }}
                                        ກີບ</td>
                                    <td>{{ date('d-M-Y ', strtotime($evaluations->date)) }}</td>
                                    <td>
                                        <form action="{{ route('evaluations.destroy', $evaluations->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
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
