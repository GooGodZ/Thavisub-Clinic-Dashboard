<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buy_Details;
use App\Models\Buys;
use App\Models\Orders;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BuysController extends Controller
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

    public function createLink($id)
    {
        $orders = Orders::find($id);

        return view('stocks.orders.buys.create', compact('orders'));
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
            'or_id' => 'required'
        ], [
            'or_id.required' => 'ເລຶອກໃບບິນສັ່ງຊື້'
        ]);

        $buys = new Buys();
        $buys->buy_no = 'Buy-No.' . rand(0000, 9999);
        $buys->date = Carbon::now()->format('Y-m-d');
        $buys->or_id = $request->or_id;
        $orders = Orders::where('id', '=', $buys->or_id)->first();
        $orders->status = 1;
        $buys->save();
        $orders->save();

        return redirect()->route('buy_details.create')->with('success', 'ເພີ່ມຂໍ້ມູນຊື້ສິນຄ້າສຳເລັດແລ້ວ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buys = Buys::find($id);
        $buy_details = Buy_Details::where('buy_id', $buys->id)->get();
        $buy_details_sum = Buy_Details::where('buy_id', $buys->id)->sum('price');

        return view('stocks.orders.buys.show', compact('buys', 'buy_details', 'buy_details_sum'));
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
        $buys = Buys::find($id);
        $buys->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນໃບສັ່ງຊື້ສິນຄ້າສຳເລັດແລ້ວ');
    }
}
