<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation_Types;
use Illuminate\Http\Request;

class Evaluation_TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluation_types = Evaluation_Types::all()->sortByDesc('created_at');

        return view('settings.evaluation_types.index', compact('evaluation_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.evaluation_types.create');
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
        ], [
            'name.required' => 'ປ້ອນຊື່ຜົນກວດ',
        ]);

        $evaluation_types = new Evaluation_Types();
        $evaluation_types->et_no = 'ET-No.' . rand(0000, 9999);
        $evaluation_types->name = $request->name;
        $evaluation_types->save();

        return redirect()->route('evaluation_types.index')->with('success', 'ເພີ່ມຂໍ້ມູນປະເພດຜົນກວດສຳເລັດແລ້ວ');
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
        $evaluation_types = Evaluation_Types::find($id);

        return view('settings.evaluation_types.edit', compact('evaluation_types'));
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
        ], [
            'name.required' => 'ປ້ອນຊື່ຜົນກວດ',
        ]);

        $evaluation_types = Evaluation_Types::where('id', '=', $id)->first();
        $evaluation_types->name = $request->name;
        $evaluation_types->save();

        return redirect()->route('evaluation_types.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນປະເພດຜົນກວດສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluation_types = Evaluation_Types::findOrFail($id);
        $evaluation_types->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນປະເພດຜົນກວດສຳເລັດແລ້ວ');
    }
}
