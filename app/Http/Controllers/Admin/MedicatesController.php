<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Evaluations;
use App\Models\Medicates;
use App\Models\Product_Types;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Cases::where('status', '!=', 0)->where('status', '!=', 1)->where('date', Carbon::today())->get();

        return view('services.medicates.index', compact('cases'));
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
        $products = Products::all();
        $cases = Cases::find($id);
        $medicates = Medicates::where('c_id', $cases->id)->get();

        return view('services.medicates.createLink', compact('products', 'cases', 'medicates'));
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
            'take' => 'required',
        ], [
            'quantity.required' => 'ປ້ອນຈຳນວນຢາ',
            'take.required' => 'ເລືອກເວລາກິນຢາ',
        ]);

        $medicates = new Medicates();
        $medicates->p_id = $request->p_id;
        $medicates->quantity = $request->quantity;
        $products = Products::all()->where('id', $medicates->p_id)->first();
        $medicates->price = $products->price * $medicates->quantity;
        $medicates->take = $request->take;
        $medicates->date = Carbon::now()->format('Y-m-d H:i:s');
        $medicates->c_id = $request->c_id;

        if ($products->quantity == 0) {
            return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
        } elseif ($products->quantity < $medicates->quantity) {
            return redirect()->back()->with('success', 'ຢາບໍ່ພຽງພໍ');
        } else {
            $products = Products::where('id', '=', $medicates->p_id)->first();
            $products->quantity = $products->quantity - $medicates->quantity;
            $cases = Cases::where('id', '=', $medicates->c_id)->first();
            $cases->status = 2;
            $medicates->save();
            $products->save();
            $cases->save();
            return redirect()->back()->with('success', 'ວາງຢາສຳເລັດ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cases = Cases::find($id);
        $medicates = Medicates::all()->where('c_id', $cases->id);
        $medicatessum = Medicates::all()->where('c_id', $cases->id)->sum('price');
        $medicatestitle = Medicates::all()->where('c_id', $cases->id)->first();

        return view('services.medicates.show', compact('medicates', 'medicatestitle', 'medicatessum'));
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
        $medicates = Medicates::findOrFail($id);
        $products = Products::where('id', '=', $medicates->p_id)->first();
        $products->quantity = $products->quantity + $medicates->quantity;
        $products->save();
        $medicates->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນວາງຢາສຳເລັດ');
    }
}
