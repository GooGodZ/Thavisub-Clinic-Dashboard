<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Medicates;
use App\Models\Product_Types;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicates = Medicates::all()->sortByDesc('created_at');

        return view('services.medicates.index', compact('medicates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = Product_Types::all()->where('name', 'ຢາ')->first();
        $cases = Cases::all()->sortByDesc('created_at');
        $products = Products::all()->where('pt_id', $product_types->id);

        return view('services.medicates.create', compact('cases', 'products'));
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
            'quantity' => 'required'
        ], [
            'quantity.required' => 'ປ້ອນຈຳນວນຢາ',
        ]);

        $medicates = new Medicates();
        $medicates->m_no = 'Med-No.' . rand(0000, 9999);
        $medicates->p_id = $request->p_id;
        $medicates->quantity = $request->quantity;
        $products = Products::all()->where('id', $medicates->p_id)->first();
        $medicates->price = $products->price * $medicates->quantity;
        $medicates->date = Carbon::now()->format('Y-m-d H:i:s');
        $medicates->c_id = $request->c_id;

        if ($products->quantity == 0) {
            return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
        } elseif ($products->quantity < $medicates->quantity) {
            return redirect()->back()->with('success', 'ຢາບໍ່ພຽງພໍ');
        } else {
            $products = Products::where('id', '=', $medicates->p_id)->first();
            $products->quantity = $products->quantity - $medicates->quantity;
            $medicates->save();
            $products->save();
            return redirect()->route('medicates.index')->with('success', 'ວາງຢາສຳເລັດແລ້ວ');
        }
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
        $medicates = Medicates::find($id);
        $product_types = Product_Types::all()->where('name', 'ຢາ')->first();
        $cases = Cases::all()->sortByDesc('created_at');
        $products = Products::all()->where('pt_id', $product_types->id);

        return view('services.medicates.edit', compact('medicates', 'cases', 'products'));
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
            'quantity' => 'required'
        ], [
            'quantity.required' => 'ປ້ອນຈຳນວນຢາ',
        ]);

        $medicates = Medicates::where('id', '=', $id)->first();
        $oldquantity = $medicates->quantity;
        $medicates->p_id = $request->p_id;
        $medicates->quantity = $request->quantity;
        $products = Products::all()->where('id', $medicates->p_id)->first();
        $medicates->price = $products->price * $medicates->quantity;
        $medicates->date = Carbon::now()->format('Y-m-d H:i:s');
        $medicates->c_id = $request->c_id;

        if ($oldquantity > $medicates->quantity) {
<<<<<<< HEAD
            if ($products->quantity + $oldquantity == 0) {
                return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
            } elseif ($products->quantity + $oldquantity < $medicates->quantity) {
=======
            if ($products->quantity == 0) {
                return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
            } elseif ($products->quantity < $medicates->quantity) {
>>>>>>> 43aaa6d7a896433286e8449380dba9bf33824ba8
                return redirect()->back()->with('success', 'ຢາບໍ່ພຽງພໍ');
            } else {
                $products = Products::where('id', '=', $medicates->p_id)->first();
                $products->quantity = $products->quantity + ($oldquantity - $medicates->quantity);
                $medicates->save();
                $products->save();
                return redirect()->route('medicates.index')->with('success', 'ວາງຢາສຳເລັດແລ້ວ');
            }
        } elseif ($oldquantity < $medicates->quantity) {
<<<<<<< HEAD
            if ($products->quantity + $oldquantity == 0) {
                return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
            } elseif ($products->quantity + $oldquantity < $medicates->quantity) {
=======
            if ($products->quantity == 0) {
                return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
            } elseif ($products->quantity < $medicates->quantity) {
>>>>>>> 43aaa6d7a896433286e8449380dba9bf33824ba8
                return redirect()->back()->with('success', 'ຢາບໍ່ພຽງພໍ');
            } else {
                $products = Products::where('id', '=', $medicates->p_id)->first();
                $products->quantity = $products->quantity - ($medicates->quantity - $oldquantity);
                $medicates->save();
                $products->save();
                return redirect()->route('medicates.index')->with('success', 'ວາງຢາສຳເລັດແລ້ວ');
            }
        } else {
            $medicates->save();
            $products->save();
            return redirect()->route('medicates.index')->with('success', 'ວາງຢາສຳເລັດແລ້ວ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicates = Medicates::findOrFail($id);
        $products = Products::where('id', '=', $medicates->p_id)->first();
        $products->quantity = $products->quantity + $medicates->quantity;
        $products->save();
        $medicates->delete();

        return redirect()->back()->with('success', 'ລົບຂໍ້ມູນວາງຢາສຳເລັດແລ້ວ');
    }
}
