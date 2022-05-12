@extends('home_master')

@section('contents')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="container">
                    <p class="card-head-top">ຂໍ້ມູນວາງຢາ</p>
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
                        <a href="{{ route('medicates.create') }}">
                            <button><i class="fa-solid fa-plus"></i>&nbsp;ເພີ່ມ</button>
                        </a>
                    </div>
                    <div class="card-body-content-table">
                        <table id="mytable" class="table table-hover" width="100%">
                            <thead>
                                <td>ລຳດັບ</td>
                                <td>ລະຫັດວາງຢາ</td>
                                <td>ຊື່ຄົນເຈັບ</td>
                                <td>ຊື່ຢາ</td>
                                <td>ປະເພດສິນຄ້າ</td>
                                <td>ຈຳນວນ</td>
                                <td>ລາຄາ</td>
                                <td>ລະຫັດລົງທະບຽນກວດ</td>
                                <td>ລະຫັດທ່ານໝໍ</td>
                                <td>ເພີ່ມເຕີມ</td>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($medicates as $medicates)
                                    <tr>
                                        <td class="table-english">{{ $number++ }}</td>
                                        <td class="table-english">{{ $medicates->m_no }}</td>
                                        <td class="table-english">{{ $medicates->cases->patients->name }}</td>
                                        <td class="table-english">{{ $medicates->products->name }}</td>
                                        <td class="table-english">{{ $medicates->products->product_types->name }}</td>
                                        <td class="table-english">{{ $medicates->quantity }}</td>
                                        <td class="table-english">{{ $medicates->price }}</td>
                                        <td class="table-english">{{ $medicates->cases->c_no }}</td>
                                        <td class="table-english">{{ $medicates->cases->doctors->doc_no }}</td>
                                        <td>
                                            <form action="{{ route('medicates.destroy', $medicates->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('medicates.edit', $medicates->id) }}">
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
