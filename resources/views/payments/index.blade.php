@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນການຊຳລະ</h1>
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
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລຳດັບ</td>
                            <td>ລະຫັດໃບບິນ</td>
                            <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                            <td>ສະຖານະ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($payments as $payments)
                                <tr>
                                    <td class="table-english">{{ $number++ }}</td>
                                    <td class="table-english">{{ $payments->pay_no }}</td>
                                    <td>{{ $payments->cases->patients->name }}</td>
                                    <td class="table-english">{{ $payments->status == 1 ? 'ຊຳລະແລ້ວ' : 'ຍັງບໍ່ທັນຊຳລະ' }}
                                    </td>
                                    <td>
                                        <form action="{{ route('payments.destroy', $payments->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('payments.edit', $payments->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ແກ້ໄຂຂໍ້ມູນ">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('payments.show', $payments->id) }}"
                                                class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="ພີມໃບບິນ" target="_blank">
                                                <i class="bi bi-printer"></i></i>
                                            </a>
                                            <button type="submit" class="bg-transparent border-0 text-danger"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="ລົບຂໍ້ມູນ"
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
    </section>
@endsection
