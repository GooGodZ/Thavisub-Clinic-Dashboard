<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_Types;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all()->sortBy('quantity');

        return view('stocks.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = Product_Types::all();

        return view('stocks.products.create', compact('product_types'));
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
            'quantity' => 'required',
            'price' => 'required',
            'pt_id' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ສິນຄ້າ',
            'quantity.required' => 'ປ້ອນຈຳນວນສິນຄ້າ',
            'price.required' => 'ປ້ອນລາຄາສິນຄ້າ',
            'pt_id.required' => 'ເລືອກປະເພດສິນຄ້າ',
        ]);

        $products = new Products();
        $products->p_no = 'Pro-No.' . rand(0000, 9999);
        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->pt_id = $request->pt_id;
        $products->save();

        return redirect()->route('products.index')->with('success', 'ເພີ່ມຂໍ້ມູນສິນຄ້າສຳເລັດ');
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
        $products = Products::find($id);
        $product_types = Product_Types::all();

        return view('stocks.products.edit', compact('products', 'product_types'));
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
            'quantity' => 'required',
            'price' => 'required',
            'pt_id' => 'required',
        ], [
            'name.required' => 'ປ້ອນຊື່ສິນຄ້າ',
            'quantity.required' => 'ປ້ອນຈຳນວນສິນຄ້າ',
            'price.required' => 'ປ້ອນລາຄາສິນຄ້າ',
            'pt_id.required' => 'ເລືອກປະເພດສິນຄ້າ',
        ]);

        $products = Products::where('id', '=', $id)->first();
        $products->name = $request->name;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->pt_id = $request->pt_id;
        $products->save();

        return redirect()->route('products.index')->with('success', 'ແກ້ໄຂຂໍ້ມູນສິນຄ້າສຳເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນສິນຄ້າສຳເລັດ');
    }
}
