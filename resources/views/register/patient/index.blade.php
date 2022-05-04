@extends('home_master')

@section('contents')
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <p class="card-head-top">ຂໍ້ມູນຄົນເຈັບ</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="container">
                <div class="card-body-content-button">
                    <a href="{{ route('patients.create') }}"><button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button></a>
                </div>
                <div class="card-body-content-table">
                    <table id="mytable" class="table table-hover">
                        <thead>
                            <td>ລະຫັດ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ອາຍຸ</td>
                            <td>ວັນ ເດືອນ ປີເກີດ</td>
                            <td></td>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('patients.edit') }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="submit" onclick="return confirm('ທ່ານຕ້ອງການລົບຂໍ້ມູນນີ້ ຫຼື ບໍ?')"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
