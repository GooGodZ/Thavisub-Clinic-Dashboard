@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນວາງຢາ</h1>
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
                    <a href="{{ route('medicates.index') }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ກັບໄປໜ້າວາງຢາ
                    </a>
                </div>
                <form action="{{ route('medicates.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                    <div class="col-9">
                                        <select name="c_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="{{ $cases->id }}">
                                                {{ $cases->c_no . ' ' . $cases->patients->name }}
                                            </option>
                                        </select>
                                        @error('c_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ວິທີກິນຢາ</label>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="1ເມັດ"
                                                    type="checkbox">
                                                <label class="form-check-label">1ເມັດ</label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="2ເມັດ"
                                                    type="checkbox">
                                                <label class="form-check-label">2ເມັດ</label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="ກ່ອນອາຫານ"
                                                    type="checkbox">
                                                <label class="form-check-label">ກ່ອນອາຫານ</label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="ຫຼັງອາຫານ"
                                                    type="checkbox">
                                                <label class="form-check-label">ຫຼັງອາຫານ</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="ເຊົ້າ"
                                                    type="checkbox">
                                                <label class="form-check-label">ເຊົ້າ</label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="ສວຍ"
                                                    type="checkbox">
                                                <label class="form-check-label">ສວຍ</label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="ແລງ"
                                                    type="checkbox">
                                                <label class="form-check-label">ແລງ</label>
                                            </div>
                                            <div class="form-check d-inline">
                                                <input name="take[]" class="form-check-input" value="ກ່ອນນອນ"
                                                    type="checkbox">
                                                <label class="form-check-label">ກ່ອນນອນ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ຢາ</label>
                                    <div class="col-9">
                                        <select name="p_id" class="form-control selectpicker" data-live-search="true">
                                            <option selected>ເລືອກຢາ</option>
                                            @foreach ($products as $products)
                                                <option value="{{ $products->id }}">
                                                    {{ $products->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('detail')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="row">
                                    <label class="col-3 col-form-label">ຈຳນວນຢາ</label>
                                    <div class="col-9">
                                        <input type="text" name="quantity" class="form-control"
                                            placeholder="ປ້ອນຈຳນວນຢາ">
                                        @error('quantity')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #8ebaa8; color: white">
                                <i class="bi bi-save2"></i>&nbsp;ບັນທືກ</button>
                            <a href="{{ route('appointmentsCreateLink', $cases->id) }}" class="btn"
                                style="background-color: #8ebaa8; color: white">ອອກໃບນັດກວດ</a>
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
                            <td>ຊື່ຢາ</td>
                            <td>ຈຳນວນ</td>
                            <td>ລາຄາ</td>
                            <td>ວິທີກິນຢາ</td>
                            <td>ວັນທີຜົນກວດ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($medicates as $medicates)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $medicates->products->name }}</td>
                                    <td>{{ number_format($medicates->quantity) }}</td>
                                    <td>{{ number_format($medicates->price) }} ກີບ</td>
                                    <td>
                                        @foreach ($medicates->take as $value)
                                            {{ $value }}
                                        @endforeach
                                    </td>
                                    <td>{{ date('d-M-Y ', strtotime($medicates->date)) }}</td>
                                    <td>
                                        <form action="{{ route('medicates.destroy', $medicates->id) }}" method="POST">
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
