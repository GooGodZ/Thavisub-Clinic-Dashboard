@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນຜົນກວດ</p>
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
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດຜົນກວດ</td>
                                <td>ຊື່ຄົນເຈັບ</td>
                                <td>ອາການ</td>
                                <td>ປະເພດຜົນກວດ</td>
                                <td>ລາຍລະອຽດ</td>
                                <td>ວັນທີຜົນກວດ</td>
                                <td>ສະຖານະ</td>
                                <td>ຕົວເລືອກ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($evaluations as $evaluations)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $evaluations->eva_no }}</td>
                                        <td class="table-english">{{ $evaluations->cases->patients->name }}</td>
                                        <td class="table-english">{{ $evaluations->cases->disea }}</td>
                                        <td class="table-english">{{ $evaluations->evaluation_types->name }}</td>
                                        <td class="table-english">{{ $evaluations->detail }}</td>
                                        <td class="table-english">{{ date('d-M-Y', strtotime($evaluations->date)) }}</td>
                                        <td class="table-english">{{ $evaluations->status == 0 ? 'ລໍຖ້າວາງຢາ' : 'ວາງຢາແລ້ວ' }}</td>
                                        <td>
                                            <form action="{{ route('evaluations.destroy', $evaluations->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('medicatesCreateLink', $evaluations->id) }}">
                                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                                </a>
                                                <a href="{{ route('evaluations.edit', $evaluations->id) }}">
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
