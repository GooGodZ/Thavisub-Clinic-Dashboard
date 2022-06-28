<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_Types;
use Illuminate\Http\Request;

class Product_TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_types = Product_Types::all()->sortByDesc('created_at');

        return view('manage.product_types.index', compact('product_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.product_types.create');
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
            'name.required' => 'ປ້ອນຊື່ປະເພດສິນຄ້າ',
        ]);

        $product_types = new Product_Types();
        $product_types->pt_no = 'PT-No.' . rand(0000, 9999);
        $product_types->name = $request->name;
        $product_types->save();

        return redirect()->route('product_types.index')->with('success', 'ເພີ່ມຂໍ້ມູນປະເພດສິນຄ້າສຳເລັດ');
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
        $product_types = Product_Types::find($id);

        return view('manage.product_types.edit', compact('product_types'));
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
            'name.required' => 'ປ້ອນຊື່ປະເພດສິນຄ້າ',
        ]);

        $product_types = Product_Types::where('id', '=', $id)->first();
        $product_types->name = $request->name;
        $product_types->save();

        return redirect()->route('product_types.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນປະເພດສິນຄ້າສຳເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_types = Product_Types::findOrFail($id);
        $product_types->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນປະເພດສິນຄ້າສຳເລັດ');
    }
}
