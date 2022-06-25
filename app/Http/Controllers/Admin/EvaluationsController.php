<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Evaluation_Types;
use App\Models\Evaluations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = cases::where('status', 1)->whereDate('date', Carbon::today())->get();
        $casestoday = cases::where('status', '!=', 0)->where('status', '!=', 1)->whereDate('date', Carbon::today())->get();

        return view('services.evaluations.index', compact('cases', 'casestoday'));
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
        $evaluation_types = Evaluation_Types::all();
        $cases = Cases::find($id);
        $evaluations = Evaluations::where('c_id', $cases->id)->get();

        return view('services.evaluations.createLink', compact('evaluation_types', 'cases', 'evaluations'));
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
            'detail' => 'required',
            'c_id' => 'required',
            'et_id' => 'required',
        ], [
            'detail.required' => 'ປ້ອນລາຍລະອຽດການປິ່ນປົວ',
            'c_id.required' => 'ເລືອກລະຫັດການລົງທະບຽນກວດ',
            'et_id.required' => 'ເລືອກປະເພດຜົນກວດ',
        ]);

        $evaluations = new Evaluations();
        $evaluations->date = Carbon::now()->format('Y-m-d');
        $evaluations->detail = $request->detail;
        $evaluations->c_id = $request->c_id;
        $evaluations->et_id = $request->et_id;
        $cases = Cases::where('id', $evaluations->c_id)->first();
        $cases->status = 1;
        $cases->save();
        $evaluations->save();

        return redirect()->back()->with('success', 'ເພີ່ມຂໍ້ມູນຜົນກວດສຳເລັດ');
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
        $evaluations = Evaluations::find($id);
        $evaluations->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນຜົນກວດສຳເລັດ');
    }
}
