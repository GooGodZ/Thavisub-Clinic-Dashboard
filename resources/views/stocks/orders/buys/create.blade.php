@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຟອມຂໍ້ມູນຊື້ສິນຄ້າເຂົ້າ</p>
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
                        <form action="{{ route('buys.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຊື່ໃບສັ່ງຊື້</label>
                                        <div class="col-9">
                                            <select name="or_id" class="form-select search">
                                                <option value="{{ $orders->id }}">
                                                    {{ $orders->or_no . ' ' . $orders->name }}
                                                </option>
                                            </select>
                                            @error('or_id')
                                                <strong style="color: red; margin-top: 0.625rem">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="row">
                                        <label class="col-3 col-form-label">ຜູ້ສະໜອງ</label>
                                        <div class="col-9">
                                            <select class="form-select search">
                                                <option value="{{ $orders->id }}">
                                                    {{ $orders->suppliers->name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <center>
                                    <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                                    <a href="{{ route('orders.index') }}">ໜ້າສັ່ງຊື້</a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
