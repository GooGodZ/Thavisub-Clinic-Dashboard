@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນຜົນກວດ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <div class="card-body-content-button">
                        <a href="{{ route('evaluations.index') }}">
                            <button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button>
                        </a>
                    </div>
                    <div class="card-body-content-form">
                        <form action="{{ route('evaluations.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ຄົນເຈັບ</label>
                                        <div class="col-9">
                                            <select name="c_id" class="form-select search">
                                                <option selected>ເລືອກຄົນເຈັບ</option>
                                                @foreach ($cases as $cases)
                                                    <option value="{{ $cases->id }}">
                                                        {{ $cases->c_no . ' ' . $cases->patients->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('c_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ປະເພດຜົນກວດ</label>
                                        <div class="col-9">
                                            <select name="et_id" class="form-select search">
                                                <option selected>ເລືອກປະເພດຜົນກວດ</option>
                                                @foreach ($evaluation_types as $evaluation_types)
                                                    <option value="{{ $evaluation_types->id }}">
                                                        {{ $evaluation_types->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('et_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ລາຍລະອຽດຜົນກວດ</label>
                                        <div class="col-9">
                                            <textarea type="text" name="detail" class="form-control" placeholder="ປ້ອນລາຍລະອຽດຜົນກວດ" rows="5"></textarea>
                                            @error('detail')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
