@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນຜົນກວດ</h1>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ
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
                                        <select name="c_id" class="form-select search">
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
                                        <select name="et_id" class="form-select search">
                                            <option selected>ເລືອກປະເພດຜົນກວດ</option>
                                            @foreach ($evaluation_types as $evaluation_types)
                                                <option value="{{ $evaluation_types->id }}">
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
                                        <textarea type="text" name="detail" class="form-control" placeholder="ປ້ອນລາຍລະອຽດຜົນກວດ" rows="5"></textarea>
                                        @error('detail')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #8ebaa8; color: white">
                                <i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
