@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນນັດກວດ</h1>
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="background-color: white">
                    <a href="{{ route('appointments.create') }}"class="btn float-end"
                        style="background-color: #8ebaa8; color: white">
                        <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                    </a>
                </div>
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດນັດກວດ</td>
                            <td>ຊື່ຄົນເຈັບ</td>
                            <td>ວັນ ເດືອນ ປີນັດກວດ</td>
                            <td>ເວລານັດກວດ</td>
                            <td>ທ່ານໝໍ</td>
                            <td>ສະຖານະ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($appointments as $appointments)
                                <tr>
                                    <td class="table-english">{{ $number++ }}</td>
                                    <td class="table-english">{{ $appointments->ap_no }}</td>
                                    <td class="table-english">{{ $appointments->cases->patients->name }}</td>
                                    <td class="table-english">{{ date('d-M-Y', strtotime($appointments->date)) }}
                                    </td>
                                    <td class="table-english">{{ $appointments->time }}</td>
                                    <td class="table-english">{{ $appointments->doctors->name }}</td>
                                    <td class="table-english">
                                        {{ $appointments->status == 0 ? 'ລໍຖ້າ' : 'ລົງທະບຽນແລ້ວ' }}</td>
                                    <td>
                                        <form action="{{ route('appointments.destroy', $appointments->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('casesCreateLinkAppointments', $appointments->id) }}">
                                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
