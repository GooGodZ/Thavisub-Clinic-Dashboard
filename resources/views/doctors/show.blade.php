@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ສະແດງຂໍ້ມູນທ່ານໝໍ</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="container">
            <h4>{{ $doctors->name }}</h4>
            <h4>{{ $doctors->dob }}</h4>
            <h4>{{ $doctors->name }}</h4>
            <h4>{{ $doctors->name }}</h4>
            <h4>{{ $doctors->name }}</h4>
        </div>
    </div>
@endsection
