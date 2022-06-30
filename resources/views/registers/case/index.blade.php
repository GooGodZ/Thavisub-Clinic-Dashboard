@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ຂໍ້ມູນລົງທະບຽນກວດ</h1>
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
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#cases"
                                type="button">ລໍຖ້າຜົນກວດ</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#casestoday"
                                type="button">ກວດແລ້ວ</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="cases">
                            <div class="card-header" style="background-color: white">
                                <a href="{{ route('cases.create') }}"class="btn float-end"
                                    style="background-color: #8ebaa8; color: white">
                                    <i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                                </a>
                            </div>
                            <table id="mytable" class="table table-hover" width="100%">
                                <thead>
                                    <td>ລຳດັບ</td>
                                    <td>ລະຫັດຟອມກວດ</td>
                                    <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                    <td>ຄວາມດັນ</td>
                                    <td>ອຸນຫະພູມ</td>
                                    <td>ອັດຕາການຫາຍໃຈ</td>
                                    <td>ຊີບພະຈອນ</td>
                                    <td>ອາການ</td>
                                    <td>ສະຖານະ</td>
                                    <td>Action</td>
                                </thead>
                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($cases as $cases)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $cases->c_no }}</td>
                                            <td>{{ $cases->patients->name }}</td>
                                            <td>{{ $cases->pressure }} mmHg</td>
                                            <td>{{ $cases->temper }} °C</td>
                                            <td>{{ $cases->respira }} bpm</td>
                                            <td>{{ $cases->pulse }} bpm</td>
                                            <td>{{ $cases->disea }}</td>
                                            <td>{{ $cases->status == 0 ? 'ລໍຖ້າຜົນກວດ' : 'ກວດແລ້ວ' }}</td>
                                            <td>
                                                <form action="{{ route('cases.destroy', $cases->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('evaluationsCreateLink', $cases->id) }}"
                                                        class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="ອອກຜົນກວດ">
                                                        <i class="bi bi-box-arrow-up-right"></i>
                                                    </a>
                                                    <a href="{{ route('cases.edit', $cases->id) }}"
                                                        class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="ແກ້ໄຂຂໍ້ມູນ">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <button type="submit" class="bg-transparent border-0 text-danger"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="ລົບຂໍ້ມູນ"
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
                        <div class="tab-pane fade mt-3" id="casestoday">
                            <table id="mytable2" class="table table-hover" width="100%">
                                <thead>
                                    <td>ລຳດັບ</td>
                                    <td>ລະຫັດຟອມກວດ</td>
                                    <td>ຊື່ ແລະ ນາມສະກຸນ</td>
                                    <td>ຄວາມດັນ</td>
                                    <td>ອຸນຫະພູມ</td>
                                    <td>ອັດຕາການຫາຍໃຈ</td>
                                    <td>ຊີບພະຈອນ</td>
                                    <td>ອາການ</td>
                                    <td>ສະຖານະ</td>
                                </thead>
                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($casestoday as $casestoday)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $casestoday->c_no }}</td>
                                            <td>{{ $casestoday->patients->name }}</td>
                                            <td>{{ $casestoday->pressure }} mmHg</td>
                                            <td>{{ $casestoday->temper }} °C</td>
                                            <td>{{ $casestoday->respira }} bpm</td>
                                            <td>{{ $casestoday->pulse }} bpm</td>
                                            <td>{{ $casestoday->disea }}</td>
                                            <td>{{ $casestoday->status == 0 ? 'ລໍຖ້າຜົນກວດ' : 'ກວດແລ້ວ' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
