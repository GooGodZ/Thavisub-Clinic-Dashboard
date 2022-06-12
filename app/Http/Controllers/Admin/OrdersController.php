<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order_Details;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();

        return view('stocks.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Suppliers::all();

        return view('stocks.orders.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sup_id' => 'required'
        ], [
            'name.required' => 'ປ້ອນຊື່ໃບບິນ',
            'sup_id.required' => 'ເລຶອກຜູ້ສະໜອງ'
        ]);

        $orders = new Orders();
        $orders->or_no = 'Or-No.' . rand(0000, 9999);
        $orders->name = $request->name;
        $orders->sup_id = $request->sup_id;
        $orders->save();

        return redirect()->route('order_DetailsCreateLink')->with('success', 'ເພີ່ມຂໍ້ມູນສັ່ງຊື້ສິນຄ້າສຳເລັດແລ້ວ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Orders::find($id);
        $orders->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນໃບສັ່ງຊື້ສິນຄ້າສຳເລັດແລ້ວ');
    }
}
