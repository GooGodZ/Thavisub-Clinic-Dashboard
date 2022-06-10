<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Evaluations;
use App\Models\Medicates;
use App\Models\Product_Types;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = Evaluations::where('status', 1)->where('date', Carbon::today())->get();

        return view('services.medicates.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = Product_Types::all()->where('name', 'ຢາ')->first();
        $products = Products::all()->where('pt_id', $product_types->id);
        $evaluations = Evaluations::all()->last();
        $medicates = Medicates::all()->where('c_id', $evaluations->c_id);

        return view('services.medicates.createLink', compact('products', 'evaluations', 'medicates'));
    }

    public function createLink($id)
    {
        $product_types = Product_Types::all()->where('name', 'ຢາ')->first();
        $products = Products::all()->where('pt_id', $product_types->id);
        $evaluations = Evaluations::find($id);
        $medicates = Medicates::all()->where('c_id', $evaluations->c_id);

        return view('services.medicates.createLink', compact('products', 'evaluations', 'medicates'));
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
            $evaluations = Evaluations::where('c_id', '=', $medicates->c_id)->first();
            $evaluations->status = 1;
            $medicates->save();
            $products->save();
            $evaluations->save();
            return redirect()->back()->with('success', 'ວາງຢາສຳເລັດແລ້ວ');
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
        $evaluations = Evaluations::find($id);
        $medicates = Medicates::all()->where('c_id', $evaluations->c_id);
        $medicatessum = Medicates::all()->where('c_id', $evaluations->c_id)->sum('price');
        $medicatestitle = Medicates::all()->where('c_id', $evaluations->c_id)->first();

        return view('services.medicates.show', compact('medicates', 'medicatestitle', 'medicatessum'));
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
            if ($products->quantity == 0) {
                return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
            } elseif ($products->quantity < $medicates->quantity) {
                return redirect()->back()->with('success', 'ຢາບໍ່ພຽງພໍ');
            } else {
                $products = Products::where('id', '=', $medicates->p_id)->first();
                $products->quantity = $products->quantity + ($oldquantity - $medicates->quantity);
                $medicates->save();
                $products->save();
                return redirect()->route('medicates.index')->with('success', 'ວາງຢາສຳເລັດແລ້ວ');
            }
        } elseif ($oldquantity < $medicates->quantity) {
            if ($products->quantity == 0) {
                return redirect()->back()->with('success', 'ຢາໝົດແລ້ວ');
            } elseif ($products->quantity < $medicates->quantity) {
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
