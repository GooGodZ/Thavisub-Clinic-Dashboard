@extends('home_master')

@section('contents')
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຟອມຂໍ້ມູນປະເພດຜົນກວດ</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <div class="card-body-content-button">
                    <a href="{{ route('evaluation_types.index') }}"><button><i class="fa-solid fa-backward"></i>&nbsp;ຍ້ອນກັບ</button></a>
                </div>
                @if($errors->any())
                <ul class="errors">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card-body-content-form">
                    <form action="{{ route('evaluation_types.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="row">
                                    <label class="col-3 col-form-label label-start">ຊື່ປະເພດຜົນກວດ</label>
                                    <div class="col-9">
                                        <input type="text" name="name" class="form-control" placeholder="ປ້ອນຊື່ປະເພດຜົນກວດ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"><i class="fa-solid fa-upload"></i>&nbsp;ບັນທືກ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
