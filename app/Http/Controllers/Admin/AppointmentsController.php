<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Cases;
use App\Models\Doctors;
use App\Models\Evaluations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointments::where('date', Carbon::today())
            ->orderBy('status', 'ASC')
            ->orderBy('time', 'ASC')
            ->get();
        $cases = Cases::where('status', '!=', 0)
            ->where('status', '!=', 1)
            ->whereDate('date', Carbon::today())
            ->orderBy('status', 'ASC')
            ->get();

        return view('services.appointments.index', compact('appointments', 'cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cases = Cases::all()->sortByDesc('created_at');
        $doctors = Doctors::all();

        return view('services.appointments.create', compact('cases', 'doctors'));
    }

    public function createLink($id)
    {
        $cases = Cases::find($id);
        $appointments = Appointments::all()->where('c_id', $cases->id);
        $doctors = Doctors::all();

        return view('services.appointments.createLink', compact('appointments', 'cases', 'doctors'));
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
            'date' => 'required',
            'time' => 'required',
            'doc_id' => 'required',
            'c_id' => 'required',
        ], [
            'date.required' => 'ເລືອກວັນທີ ເດືອນ ປີນັດ',
            'time.required' => 'ເລືອກເວລານັດ',
            'doc_id.required' => 'ເລືອກທ່ານໝໍນັດ',
            'c_id.required' => 'ເລືອກລົງທະບຽນກວດ',
        ]);

        $appointments = new Appointments();
        $appointments->ap_no = 'App-No.' . rand(0000, 9999);
        $appointments->date = $request->date;
        $appointments->time = $request->time;
        $appointments->doc_id = $request->doc_id;
        $appointments->c_id = $request->c_id;
        $cases = Cases::where('id', $appointments->c_id)->first();
        $cases->status = 3;
        $appointments->save();
        $cases->save();

        return redirect()->route('appointments.index')->with('success', 'ເພີ່ມຂໍ້ມູນນັດກວດສຳເລັດ');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
