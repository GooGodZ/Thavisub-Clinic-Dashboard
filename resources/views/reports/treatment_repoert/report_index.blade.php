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
                            <td></td>
                        </thead>
                        <tbody>
                            @foreach ($treatment as $treatment)
                                <tr>
                                    <td>{{ $treatment->pt_no }}</td>
                                    <td>{{ $treatment->doc_no }}</td>
                                    <td>{{ $treatment->name }}</td>
                                    <td>{{ $treatment->pt_id }}</td>
                                    <td>
                                        <form action="">
                                            <a href="{{ route('reportTreatmentShow', $treatment->id) }}">
                                                <i class="fa-regular fa-file-lines"></i>
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
