@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນວາງຢາ</p>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert-success">
            <span class="close-alert-button" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ redirect()->back()->getTargetUrl() }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="card-body-content-form">
                        <form action="{{ route('medicates.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                        <div class="col-9">
                                            <select name="c_id" class="form-select search">
                                                <option value="{{ $evaluations->c_id }}">
                                                    {{ $evaluations->eva_no . ' ' . $evaluations->cases->patients->name }}
                                                </option>
                                            </select>
                                            @error('c_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ຢາ</label>
                                        <div class="col-9">
                                            <select name="p_id" class="form-select search">
                                                <option selected>ເລືອກຢາ</option>
                                                @foreach ($products as $products)
                                                    <option value="{{ $products->id }}">
                                                        {{ $products->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('p_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
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
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                                    <a href="{{ route('appointmentsCreateLink', $evaluations->id) }}">ອອກໃບນັດກວດ</a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ຊື່ຢາ</td>
                                <td>ຈຳນວນ</td>
                                <td>ລາຄາ</td>
                                <td>ວັນທີຜົນກວດ</td>
                                <td>ຕົວເລືອກ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($medicates as $medicates)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $medicates->products->name }}</td>
                                        <td class="table-english">{{ $medicates->quantity }}</td>
                                        <td class="table-english">{{ $medicates->price }}</td>
                                        <td class="table-english">{{ date('d-M-Y ', strtotime($medicates->date)) }}</td>
                                        <td>
                                            <form action="{{ route('medicates.destroy', $medicates->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('medicates.edit', $medicates->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button type="submit"
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
        </div>
    </div>
@endsection
