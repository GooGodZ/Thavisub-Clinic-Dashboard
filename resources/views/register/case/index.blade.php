@extends('home_master')

@section('contents')
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຂໍ້ມູນລົງທະບຽນກວດ</p>
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
                    <a href="{{ route('cases.create') }}"><button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button></a>
                </div>
                <div class="card-body-content-table">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດຟອມກວດ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ຄວາມດັນ</td>
                            <td>ອຸນຫະພູມ</td>
                            <td>ລະບົບທາງເດີນຫາຍໃຈ</td>
                            <td>ຊີບພະຈອນ</td>
                            <td>ອາການ</td>
                            <td>ເພີ່ມເຕີມ</td>
                        </thead>
                        <tbody>
                            @php
                            $number = 1;
                            @endphp
                            @foreach($cases as $cases)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $cases->c_no }}</td>
                                <td>{{ $cases->patients->name }}</td>
                                <td>{{ $cases->pressure }}</td>
                                <td>{{ $cases->temper }} °C</td>
                                <td>{{ $cases->respira }}</td>
                                <td>{{ $cases->pulse }}</td>
                                <td>{{ $cases->disea }}</td>
                                <td>
                                    <form action="{{ route('cases.destroy', $cases->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('cases.edit', $cases->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
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
