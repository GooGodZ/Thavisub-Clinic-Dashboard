@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນທ່ານໝໍ</p>
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
                        <a href="{{ route('doctors.create') }}">
                            <button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                        </a>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດໝໍ</td>
                                <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                <td>ເບີໂທຕິດຕໍ່</td>
                                <td>ທີ່ຢູ່</td>
                                <td>ວັນ ເດືອນ ປີເກີດ</td>
                                <td>ເພີ່ມເຕີມ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($doctors as $doctors)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $doctors->doc_no }}</td>
                                        <td>{{ $doctors->name }}</td>
                                        <td class="table-english">{{ $doctors->tel }}</td>
                                        <td>{{ $doctors->address }}</td>
                                        <td class="table-english">{{ date('d-M-Y ', strtotime($doctors->dob)) }}</td>
                                        <td>
                                            <form action="{{ route('doctors.destroy', $doctors->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('doctors.show', $doctors->id) }}">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('doctors.edit', $doctors->id) }}">
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
