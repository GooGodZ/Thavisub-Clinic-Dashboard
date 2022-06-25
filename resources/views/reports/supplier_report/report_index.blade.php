@extends('home_master')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ລາຍງານຜູ້ສະໜອງ</h1>
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
                            <td>ລະຫັດຜູ້ສະໜອງ</td>
                            <td>ຊື່ຜູ້ສະໜອງ</td>
                            <td>ຈຳນວນຄັ້ງທີ່ສັ່ງ</td>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $supplier)
                                <tr>
                                    <td>{{ $supplier->sup_no }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->sup_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
