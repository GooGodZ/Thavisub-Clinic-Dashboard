@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຟອມຂໍ້ມູນຊື້ສິນຄ້າເຂົ້າ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ redirect()->back()->getTargetUrl() }}"class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="bi bi-arrow-return-left"></i>&nbsp;ຍ້ອນກັບ
                    </a>
                </div>
                <form action="{{ route('buys.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຊື່ໃບສັ່ງຊື້</label>
                                    <div class="col-9">
                                        <select name="or_id" class="form-select">
                                            <option value="{{ $orders->id }}">
                                                {{ $orders->or_no . ' ' . $orders->name }}
                                            </option>
                                        </select>
                                        @error('or_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group row">
                                    <label class="col-3 col-form-label">ຜູ້ສະໜອງ</label>
                                    <div class="col-9">
                                        <select class="form-select">
                                            <option value="{{ $orders->id }}">
                                                {{ $orders->suppliers->name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn" style="background-color: #8ebaa8; color: white">
                                <i class="bi bi-save2"></i>&nbsp;ບັນທືກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
