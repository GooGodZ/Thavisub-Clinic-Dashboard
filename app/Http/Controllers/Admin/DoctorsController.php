<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctors::all()->sortByDesc('created_at');

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'tel' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ ແລະ ນາມສະກຸນ',
            'day.required' => 'ປ້ອນວັນທີເກີດ',
            'month.required' => 'ປ້ອນເດືອນເກີດ',
            'year.required' => 'ປ້ອນປີເກີດ',
            'gender.required' => 'ເລືອກເພດ',
            'address.required' => 'ປ້ອນທີ່ຢູ່',
            'tel.required' => 'ປ້ອນເບີໂທຕິດຕໍ່',
        ]);

        $doctors = new Doctors();
        $doctors->doc_no = 'Doc-No.' . rand(0000, 9999);
        $doctors->name = $request->name;
        $doctors->dob = $request->year . '-' . $request->month . '-' . $request->day;
        $doctors->gender = $request->gender;
        $doctors->address = $request->address;
        $doctors->tel = $request->tel;
        $doctors->save();

        return redirect()->route('doctors.index')->with('success', 'ເພີ່ມຂໍ້ມູນທ່ານໝໍສຳເລັດແລ້ວ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctors = Doctors::find($id);

        return view('doctors.show', compact('doctors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = Doctors::find($id);

        return view('doctors.edit', compact('doctors'));
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
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'tel' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ ແລະ ນາມສະກຸນ',
            'day.required' => 'ປ້ອນວັນທີເກີດ',
            'month.required' => 'ປ້ອນເດືອນເກີດ',
            'year.required' => 'ປ້ອນປີເກີດ',
            'gender.required' => 'ເລືອກເພດ',
            'address.required' => 'ປ້ອນທີ່ຢູ່',
            'tel.required' => 'ປ້ອນເບີໂທຕິດຕໍ່',
        ]);

        $doctors = Doctors::where('id', '=', $id)->first();
        $doctors->name = $request->name;
        $doctors->dob = $request->year . '-' . $request->month . '-' . $request->day;
        $doctors->gender = $request->gender;
        $doctors->address = $request->address;
        $doctors->tel = $request->tel;
        $doctors->save();

        return redirect()->route('doctors.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນທ່ານໝໍສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctors = Doctors::findOrFail($id);
        $doctors->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນທ່ານໝໍສຳເລັດແລ້ວ');
    }
}
