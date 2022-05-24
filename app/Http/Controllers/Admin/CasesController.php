<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Doctors;
use App\Models\Patients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Cases::all()->sortByDesc('created_at');
        // $cases = DB::table('cases')
        //     ->groupBy('date')
        //     ->orderBy('created_at', 'desc');
        // dd($cases);

        return view('registers.case.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patients::all()->sortByDesc('created_at');
        $doctors = Doctors::all();

        return view('registers.case.create', compact('patients', 'doctors'));
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
            'pressure1' => 'required',
            'pressure2' => 'required',
            'temper' => 'required',
            'respira' => 'required',
            'pulse' => 'required',
            'disea' => 'required',
            'pt_id' => 'required',
            'doc_id' => 'required',
        ], [
            'pressure1.required' => 'ປ້ອນຄວາມດັນ',
            'pressure2.required' => 'ປ້ອນຄວາມດັນ',
            'temper.required' => 'ປ້ອນອຸນຫະພູມ',
            'respira.required' => 'ປ້ອນທາງເດີນຫາຍໃຈ',
            'pulse.required' => 'ປ້ອນຊີບພະຈອນ',
            'disea.required' => 'ປ້ອນອາການ',
            'pt_id.required' => 'ເລືອກຄົນເຈັບ',
            'doc_id.required' => 'ເລືອກທ່ານໝໍ',
        ]);

        $cases = new Cases();
        $cases->c_no = 'Cas-No.' . rand(0000, 9999);
        $cases->date = Carbon::now()->format('Y-m-d');
        $cases->pressure = $request->pressure1 . ' / ' . $request->pressure2;
        $cases->temper = $request->temper;
        $cases->respira = $request->respira;
        $cases->pulse = $request->pulse;
        $cases->disea = $request->disea;
        $cases->pt_id = $request->pt_id;
        $cases->doc_id = $request->doc_id;
        $cases->save();

        return redirect()->route('cases.index')->with('success', 'ເພີ່ມຂໍ້ມູນລົງທະບຽນກວດສຳເລັດແລ້ວ');
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
        $cases = Cases::find($id);
        $patients = Patients::all()->sortByDesc('created_at');
        $doctors = Doctors::all();

        return view('registers.case.edit', compact('cases', 'patients', 'doctors'));
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
            'pressure1' => 'required',
            'pressure2' => 'required',
            'temper' => 'required',
            'respira' => 'required',
            'pulse' => 'required',
            'disea' => 'required',
            'pt_id' => 'required',
            'doc_id' => 'required',
        ], [
            'pressure1.required' => 'ປ້ອນຄວາມດັນ',
            'pressure2.required' => 'ປ້ອນຄວາມດັນ',
            'temper.required' => 'ປ້ອນອຸນຫະພູມ',
            'respira.required' => 'ປ້ອນທາງເດີນຫາຍໃຈ',
            'pulse.required' => 'ປ້ອນຊີບພະຈອນ',
            'disea.required' => 'ປ້ອນອາການ',
            'pt_id.required' => 'ເລືອກຄົນເຈັບ',
            'doc_id.required' => 'ເລືອກທ່ານໝໍ',
        ]);

        $cases = Cases::where('id', '=', $id)->first();
        $cases->pressure = $request->pressure1 . ' / ' . $request->pressure2;
        $cases->temper = $request->temper;
        $cases->respira = $request->respira;
        $cases->pulse = $request->pulse;
        $cases->disea = $request->disea;
        $cases->pt_id = $request->pt_id;
        $cases->doc_id = $request->doc_id;
        $cases->save();

        return redirect()->route('cases.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນລົງທະບຽນກວດສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cases = Cases::findOrFail($id);
        $cases->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນລົງທະບຽນກວດສຳເລັດແລ້ວ');
    }
}
