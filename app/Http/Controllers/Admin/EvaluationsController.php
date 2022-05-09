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
        $evaluations = Evaluations::all()->sortByDesc('created_at');

        return view('services.evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluation_types = Evaluation_Types::all();
        $cases = Cases::all()->sortByDesc('created_at');

        return view('services.evaluations.create', compact('evaluation_types', 'cases'));
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
        $evaluations->eva_no = 'Eva-No.' . rand(0000, 9999);
        $evaluations->date = Carbon::now()->format('Y-m-d H:i:s');
        $evaluations->detail = $request->detail;
        $evaluations->c_id = $request->c_id;
        $evaluations->et_id = $request->et_id;
        $evaluations->save();

        return redirect()->route('evaluations.index')->with('success', 'ເພີ່ມຂໍ້ມູນຜົນກວດສຳເລັດແລ້ວ');
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
        $evaluations = Evaluations::find($id);
        $evaluation_types = Evaluation_Types::all();
        $cases = Cases::all()->sortByDesc('created_at');

        return view('services.evaluations.edit', compact('evaluations', 'evaluation_types', 'cases'));
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
            'detail' => 'required',
            'c_id' => 'required',
            'et_id' => 'required',
        ], [
            'detail.required' => 'ປ້ອນລາຍລະອຽດການປິ່ນປົວ',
            'c_id.required' => 'ເລືອກລະຫັດການລົງທະບຽນກວດ',
            'et_id.required' => 'ເລືອກປະເພດຜົນກວດ',
        ]);

        $evaluations = Evaluations::where('id', '=', $id)->first();
        $evaluations->detail = $request->detail;
        $evaluations->c_id = $request->c_id;
        $evaluations->et_id = $request->et_id;
        $evaluations->save();

        return redirect()->route('evaluations.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນຜົນກວດສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluations = Evaluations::findOrFail($id);
        $evaluations->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນຜົນກວດສຳເລັດແລ້ວ');
    }
}
