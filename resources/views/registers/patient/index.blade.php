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
                        <a href="{{ route('patients.create') }}">
                            <button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                        </a>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດ</td>
                                <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                <td>ອາຍຸ</td>
                                <td>ວັນ ເດືອນ ປີເກີດ</td>
                                <td>ເບີໂທຕິດຕໍ່</td>
                                <td>ຕົວເລືອກ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($patients as $patients)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $patients->pt_no }}</td>
                                        <td>{{ $patients->name }}</td>
                                        <td class="table-english">{{ $patients->getAgeAttribute() }}</td>
                                        <td class="table-english">{{ date('d-M-Y ', strtotime($patients->dob)) }}</td>
                                        <td class="table-english">{{ $patients->tel }}</td>
                                        <td>
                                            <form action="{{ route('patients.destroy', $patients->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('patients.edit', $patients->id) }}">
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
