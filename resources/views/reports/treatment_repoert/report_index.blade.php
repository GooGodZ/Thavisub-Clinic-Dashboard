@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານປະຫວັດປິ່ນປົວ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="mytable" class="table table-hover" width="100%">
                        <thead>
                            <td>ລະຫັດຄົນເຈັບ</td>
                            <td>ລະຫັດໝໍ</td>
                            <td>ຊື່ຄົນເຈັບ</td>
                            <td>ຈຳນວນຄັ້ງ</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @foreach ($treatment as $treatment)
                                <tr>
                                    <td>{{ $treatment->pt_no }}</td>
                                    <td>{{ $treatment->doc_no }}</td>
                                    <td>{{ $treatment->name }}</td>
                                    <td>{{ $treatment->pt_id }}</td>
                                    <td>
                                        <a href="{{ route('reportTreatmentShow', $treatment->id) }}"
                                            class="text-primary text-decoration-none" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="ສະແດງປະຫວັດປິ່ນປົວ">
                                            <i class="fa-regular fa-file-lines"></i>
                                        </a>
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
