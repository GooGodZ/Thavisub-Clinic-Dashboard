<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
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
        $cases = Cases::where('status', '!=', 0)
            ->where('status', '!=', 4)
            ->whereDate('date', Carbon::today())
            ->orderBy('status', 'ASC')
            ->get();
        $payments = Payments::where('date', Carbon::today())->get();

        return view('payments.index', compact('payments', 'cases'));
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
        $cases = Cases::find($id);
        $evaluations = Evaluations::selectRaw("evaluations.*, SUM(evaluation_types.price) as price")
            ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
            ->where('evaluations.c_id', $cases->id)
            ->get();
        $medicates_sum = Medicates::where('c_id', $cases->id)->sum('price');

        return view('payments.createLink', compact('cases', 'evaluations', 'medicates_sum'));
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
            'price_p' => 'required',
            'price_e' => 'required'
        ], [
            'price_p.required' => 'ປ້ອນລາຄາຢາ',
            'price_e.required' => 'ປ້ອນລາຄາຜົນກວດ'
        ]);

        $payments = new Payments();
        $payments->pay_no = 'Pay-No.' . rand(0000, 9999);
        $payments->c_id = $request->c_id;
        $payments->price_p = $request->price_p;
        $payments->price_e = $request->price_e;
        $payments->total = $payments->price_p + $payments->price_e;
        $payments->date = Carbon::now()->format('Y-m-d');
        $cases = Cases::where('id', '=', $payments->c_id)->first();
        $cases->status = 4;
        $payments->save();
        $cases->save();

        return redirect()->route('payments.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນການຊຳລະສຳເລັດ');
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
        $payments = Payments::find($id);
        $payments->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນການຊຳລະສຳເລັດ');
    }
}
