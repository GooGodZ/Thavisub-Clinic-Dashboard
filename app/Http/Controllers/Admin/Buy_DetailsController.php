<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buy_Details;
use App\Models\Buys;
use App\Models\Order_Details;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class Buy_DetailsController extends Controller
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
        $buys = Buys::all()->last();
        $buy_details = Buy_Details::where('buy_id', $buys->id)->get();
        $order_details = Order_Details::where('or_id', $buys->or_id)->get();

        return view('stocks.orders.buy_details.create', compact('buys', 'buy_details', 'order_details'));
    }

    public function createLink($id)
    {
        $buys = Buys::find($id);
        $buy_details = Buy_Details::where('buy_id', $buys->id)->get();
        $order_details = Order_Details::where('or_id', $buys->or_id)->get();

        return view('stocks.orders.buy_details.createLink', compact('buys', 'buy_details', 'order_details'));
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
            'price' => 'required',
            'buy_id' => 'required',
            'p_id' => 'required'
        ], [
            'quantity.required' => 'ປ້ອນຈຳນວນສິນຄ້າ',
            'price.required' => 'ປ້ອນລາຄາສິນຄ້າ',
            'buy_id.required' => 'ເລຶອກສິນຄ້າ',
            'p_id.required' => 'ເລຶອກສິນຄ້າ'
        ]);

        $buy_details = new Buy_Details();
        $buy_details->quantity = $request->quantity;
        $buy_details->price = $request->price;
        $buy_details->buy_id = $request->buy_id;
        $buy_details->p_id = $request->p_id;
        $products = Products::where('id', '=', $buy_details->p_id)->first();
        $products->quantity = $products->quantity + $buy_details->quantity;
        $buy_details->save();
        $products->save();

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
        //
    }
}
