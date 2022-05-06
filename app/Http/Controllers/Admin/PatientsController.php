<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::all()->sortByDesc('created_at');

        return view('register.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.patient.create');
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
            'dob' => 'required',
            'gender' => 'required',
            'tel' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ ແລະ ນາມສະກຸນ',
            'dob.required' => 'ປ້ອນວັນທີ ເດືອນ ປີເກີດ',
            'gender.required' => 'ເລືອກເພດ',
            'tel.required' => 'ປ້ອນເບີໂທຕິດຕໍ່',
        ]);

        $patients = new Patients();
        $patients->pt_no = 'Pat-No.' . rand(0000, 9999);
        $patients->name = $request->name;
        $patients->dob = $request->dob;
        $patients->gender = $request->gender;
        $patients->tel = $request->tel;
        $patients->save();

        return redirect()->route('patients.index')->with('success', 'ເພີ່ມຂໍ້ມູນຄົນເຈັບສຳເລັດແລ້ວ');
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
        $patients = Patients::find($id);

        return view('register.patient.edit', compact('patients'));
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
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'tel' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ ແລະ ນາມສະກຸນ',
            'dob.required' => 'ປ້ອນວັນທີ ເດືອນ ປີເກີດ',
            'gender.required' => 'ເລືອກເພດ',
            'tel.required' => 'ປ້ອນເບີໂທຕິດຕໍ່',
        ]);

        $patients = Patients::where('id', '=', $id)->first();
        $patients->name = $request->name;
        $patients->dob = $request->dob;
        $patients->gender = $request->gender;
        $patients->tel = $request->tel;
        $patients->save();

        return redirect()->route('patients.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນຄົນເຈັບສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients = Patients::findOrFail($id);
        $patients->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນຄົນເຈັບສຳເລັດແລ້ວ');
    }
}
