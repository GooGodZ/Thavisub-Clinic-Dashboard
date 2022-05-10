<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Suppliers::all()->sortByDesc('created_at');

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'tel' => 'required',
            'email' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ຜູ້ສະໝອງ',
            'tel.required' => 'ປ້ອນເບີໂທຕິດຕໍ່',
            'email.required' => 'ປ້ອນອີເມວ',
            'address.required' => 'ປ້ອນທີ່ຢູ່',
        ]);

        $suppliers = new Suppliers();
        $suppliers->sup_no = 'Sup-No.' . rand(0000, 9999);
        $suppliers->name = $request->name;
        $suppliers->tel = $request->tel;
        $suppliers->email = $request->email;
        $suppliers->address = $request->address;
        $suppliers->save();

        return redirect()->route('suppliers.index')->with('success', 'ເພີ່ມຂໍ້ມູນຜູ້ສະໝອງສຳເລັດແລ້ວ');
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
        $suppliers = Suppliers::find($id);

        return view('suppliers.edit', compact('suppliers'));
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
            'tel' => 'required',
            'email' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ຜູ້ສະໝອງ',
            'tel.required' => 'ປ້ອນເບີໂທຕິດຕໍ່',
            'email.required' => 'ປ້ອນອີເມວ',
            'address.required' => 'ປ້ອນທີ່ຢູ່',
        ]);

        $suppliers = Suppliers::where('id', '=', $id)->first();
        $suppliers->name = $request->name;
        $suppliers->tel = $request->tel;
        $suppliers->email = $request->email;
        $suppliers->address = $request->address;
        $suppliers->save();

        return redirect()->route('suppliers.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນຜູ້ສະໝອງສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suppliers = Suppliers::findOrFail($id);
        $suppliers->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນຜູ້ສະໝອງສຳເລັດແລ້ວ');
    }
}
