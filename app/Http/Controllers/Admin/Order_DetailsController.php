<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order_Details;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class Order_DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createLink()
    {
        $suppliers = Suppliers::all();
        $products = Products::all();
        $orders = Orders::all()->last();
        $order_details = Order_Details::where('or_id', $orders->id)->get();

        return view('stocks.orders.createLink', compact('suppliers', 'products', 'orders', 'order_details'));
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
            'quantity' => 'required',
            'or_id' => 'required',
            'p_id' => 'required'
        ], [
            'quantity.required' => 'ປ້ອນຈຳນວນສິນຄ້າ',
            'or_id.required' => 'ເລຶອກສິນຄ້າ',
            'p_id.required' => 'ເລຶອກສິນຄ້າ'
        ]);

        $order_details = new Order_Details();
        $order_details->quantity = $request->quantity;
        $order_details->or_id = $request->or_id;
        $order_details->p_id = $request->p_id;
        $order_details->save();

        return redirect()->back()->with('success', 'ເພີ່ມຂໍ້ມູນສັ່ງຊື້ສິນຄ້າສຳເລັດແລ້ວ');
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
        $order_details = Order_Details::find($id);
        $order_details->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນສິນຄ້າສຳເລັດແລ້ວ');
    }
}
