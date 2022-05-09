@extends('home_master')

@section('contents')
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຂໍ້ມູນນັດກວດ</p>
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
                    <a href="{{ route('appointments.create') }}"><button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button></a>
                </div>
                <div class="card-body-content-table">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດນັດກວດ</td>
                            <td>ຊື່ຄົນເຈັບ</td>
                            <td>ວັນ ເດືອນ ປີນັດກວດ</td>
                            <td>ເວລານັດກວດ</td>
                            <td>ທ່ານໝໍ</td>
                            <td>ເພີ່ມເຕີມ</td>
                        </thead>
                        <tbody>
                            @php
                            $number = 1;
                            @endphp
                            @foreach($appointments as $appointments)
                            <tr>
                                <td class="table-english">{{ $number++ }}</td>
                                <td class="table-english">{{ $appointments->ap_no }}</td>
                                <td class="table-english">{{ $appointments->cases->patients->name }}</td>
                                <td class="table-english">{{ date('d-M-Y', strtotime($appointments->date)) }}</td>
                                <td class="table-english">{{ $appointments->time }}</td>
                                <td class="table-english">{{ $appointments->doctors->name }}</td>
                                <td>
                                    <form action="{{ route('appointments.destroy', $appointments->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('appointments.edit', $appointments->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="submit" onclick="return confirm('ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ?')"><i class="fa-solid fa-trash-can"></i></button>
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
