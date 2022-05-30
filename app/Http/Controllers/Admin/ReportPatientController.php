<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Patients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $report_patients_pt = DB::table('cases')->distinct()->get(['pt_id']);
        // dd($report_patients_pt);
        // $report_patients_count = Cases::all()->groupBy('pt_id')->count();
        // dd($report_patients_count);
        // dd($report_patients);
        // ->whereBetween('date', [$datestart, $dateend])
        // $report_patients = Cases::all();

        $report_patients = Cases::all()->groupBy('pt_id');
        // $report_patients = DB::select('select * from cases where');
        // $report_patients = DB::table('cases')
        //         ->groupBy('pt_id')
        //         ->get();

        return view('reports.patient_report.report_index', compact('report_patients'));
    }

    // public function search()
    // {
    //     if (request()->start_date || request()->end_date) {
    //         $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
    //         $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
    //         $search_date = Cases::whereBetween('date',[$start_date,$end_date])->get();
    //     } else {
    //         $search_date = Cases::latest()->get();
    //     }

    //     return view('reports.patient_report.report_index', compact('search_date'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
