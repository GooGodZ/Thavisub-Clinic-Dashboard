<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation_Types;
use App\Models\Evaluations;
use App\Models\Medicates;
use App\Models\Payments;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payments::where('date', Carbon::today())->orderBy('status', 'ASC')->get();

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = Payments::find($id);
        $medicates = Medicates::where('c_id', $payments->c_id)->get();

        return view('payments.show', compact('payments', 'medicates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payments = Payments::find($id);
        $evaluations = Evaluations::selectRaw("evaluations.*, SUM(evaluation_types.price) as price")
            ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
            ->where('evaluations.c_id', $payments->c_id)
            ->get();
        $medicates_sum = Medicates::where('c_id', $payments->c_id)->sum('price');

        return view('payments.edit', compact('payments', 'medicates_sum', 'evaluations'));
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
        $request->validate([
            'price_p' => 'required',
            'price_e' => 'required'
        ], [
            'price_p.required' => 'ປ້ອນລາຄາຢາ',
            'price_e.required' => 'ປ້ອນລາຄາຜົນກວດ'
        ]);

        $payments = Payments::where('id', '=', $id)->first();
        $payments->price_p = $request->price_p;
        $payments->price_e = $request->price_e;
        $payments->total = $payments->price_p + $payments->price_e;
        $payments->status = 1;
        $payments->save();

        return redirect()->route('payments.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນການຊຳລະສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments = Payments::find($id);
        $payments->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນການຊຳລະສຳເລັດແລ້ວ');
    }
}
