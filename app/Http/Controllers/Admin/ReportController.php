<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Buy_Details;
use App\Models\Buys;
use App\Models\Cases;
use App\Models\Evaluations;
use App\Models\Medicates;
use App\Models\Patients;
use App\Models\Payments;
use App\Models\Products;
use App\Models\Suppliers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reportPatient()
    {
        $patient = Patients::selectRaw("patients.*, COUNT(cases.pt_id) as pt_id",)
            ->leftjoin('cases', 'cases.pt_id', '=', 'patients.id')
            ->groupBy('cases.pt_id')
            ->get();

        return view('reports.patient_report.report_index', compact('patient'));
    }

    public function reportPatientSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $patient = Patients::selectRaw("patients.*, COUNT(cases.pt_id) as pt_id",)
                ->leftjoin('cases', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->whereBetween('date', [$startdate, $enddate])
                ->get();
        }

        return view('reports.patient_report.report_index', compact('patient'));
    }

    public function reportCase()
    {
        $cases = Cases::selectRaw("MAX(cases.date) as date, patients.name")
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->groupBy('cases.pt_id')
            ->orderBy('cases.date', 'DESC')
            ->get();

        return view('reports.case_report.report_index', compact('cases'));
    }

    public function reportCaseSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $cases = Cases::selectRaw("MAX(cases.date) as date, patients.name")
                ->join('patients', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->whereBetween('date', [$startdate, $enddate])
                ->get();
        }

        return view('reports.case_report.report_index', compact('cases'));
    }

    public function reportEvaluation()
    {
        $casetoday = Cases::selectRaw("cases.id, patients.pt_no, doctors.doc_no, patients.name, cases.date")
            ->join('doctors', 'cases.doc_id', '=', 'doctors.id')
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->whereIn('cases.id', function ($query) {
                $query->selectRaw('MAX(cases.id)')->from('cases')
                    ->groupBy('cases.pt_id');
            })
            ->whereDate('cases.date', Carbon::today())
            ->get();

        return view('reports.evaluation_report.report_index', compact('casetoday'));
    }

    public function reportEvaluationPrint($id)
    {
        $cases = Cases::find($id);
        $evaluations = Evaluations::where('c_id', $cases->id)->get();
        $medicates = Medicates::where('c_id', $cases->id)->get();

        return view('reports.evaluation_report.report_print', compact('cases', 'evaluations', 'medicates'));
    }

    public function reportAppointment()
    {
        $appointmenttoday = Appointments::selectRaw("appointments.id, patients.pt_no, doctors.doc_no, cases.c_no, patients.name, appointments.date")
            ->join('cases', 'appointments.c_id', '=', 'cases.id')
            ->join('doctors', 'appointments.doc_id', '=', 'doctors.id')
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->whereIn('appointments.id', function ($query) {
                $query->selectRaw('MAX(appointments.id)')->from('appointments')
                    ->join('cases', 'appointments.c_id', '=', 'cases.id')
                    ->groupBy('cases.pt_id');
            })
            ->whereDate('appointments.created_at', Carbon::today())
            ->get();

        $appointmentall = Appointments::selectRaw("appointments.id, patients.pt_no, doctors.doc_no, cases.c_no, patients.name, appointments.date")
            ->join('cases', 'appointments.c_id', '=', 'cases.id')
            ->join('doctors', 'appointments.doc_id', '=', 'doctors.id')
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->whereIn('appointments.id', function ($query) {
                $query->selectRaw('MAX(appointments.id)')->from('appointments')
                    ->join('cases', 'appointments.c_id', '=', 'cases.id')
                    ->groupBy('cases.pt_id');
            })
            ->get();

        return view('reports.appointment_report.report_index', compact('appointmenttoday', 'appointmentall'));
    }

    public function reportAppointmentPrint($id)
    {
        $appointment = Appointments::find($id);

        return view('reports.appointment_report.report_print', compact('appointment'));
    }

    public function reportTreatment()
    {
        $treatment = Cases::selectRaw("cases.id, patients.pt_no, doctors.doc_no, patients.name, COUNT(cases.pt_id) as pt_id")
            ->join('doctors', 'cases.doc_id', '=', 'doctors.id')
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->groupBy('cases.pt_id')
            ->get();

        return view('reports.treatment_repoert.report_index', compact('treatment'));
    }

    public function reportTreatmentShow($id)
    {
        $treatment = Cases::find($id);
        $cases = Cases::where('pt_id', $treatment->pt_id)->get();
        $patients = Patients::where('id', $treatment->pt_id)->first();
        $treatments = Cases::selectRaw("cases.date, cases.disea, evaluations.detail, evaluation_types.name")
            ->join('evaluations', 'cases.id', '=', 'evaluations.c_id')
            ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
            ->where('cases.pt_id', $patients->id)
            ->get();
        $date_today = Carbon::today();

        return view('reports.treatment_repoert.report_show', compact('patients', 'treatment', 'treatments', 'date_today'));
    }

    public function reportTreatmentPrint($id)
    {
        $treatment = Cases::find($id);
        $cases = Cases::where('pt_id', $treatment->pt_id)->get();
        $patients = Patients::where('id', $treatment->pt_id)->first();
        $treatments = Cases::selectRaw("cases.date, cases.disea, evaluations.detail, evaluation_types.name")
            ->join('evaluations', 'cases.id', '=', 'evaluations.c_id')
            ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
            ->where('cases.pt_id', $patients->id)
            ->get();

        return view('reports.treatment_repoert.report_print', compact('patients', 'treatment', 'treatments'));
    }

    public function reportSupplier()
    {
        $supplier = Suppliers::selectRaw("suppliers.*, COUNT(orders.sup_id) as sup_id, orders.created_at")
            ->leftjoin('orders', 'suppliers.id', '=', 'orders.sup_id')
            ->groupBy('suppliers.id')
            ->get();
        return view('reports.supplier_report.report_index', compact('supplier'));
    }

    public function reportProduct()
    {
        $product = Products::selectRaw("products.*, product_types.name as pt_name, SUM(medicates.quantity) as usequantity, medicates.date")
            ->join('product_types', 'products.pt_id', '=', 'product_types.id')
            ->leftjoin('medicates', 'products.id', '=', 'medicates.p_id')
            ->groupBy('products.id')
            ->get();

        return view('reports.product_report.report_index', compact('product'));
    }

    public function reportExpense()
    {
        $expense = Buys::selectRaw("buys.buy_no, buys.date, SUM(buy_details.price) as price")
            ->join('buy_details', 'buys.id', '=', 'buy_details.buy_id')
            ->groupBy('buys.date')
            ->whereMonth('buys.date', Carbon::now()->format('m'))
            ->get();
        $expense_sum = Buy_Details::whereMonth('created_at', Carbon::now()->format('m'))->sum('price');

        return view('reports.expense_report.report_index', compact('expense', 'expense_sum'));
    }

    public function reportIncome()
    {
        $income = Payments::whereMonth('date', Carbon::now()->format('m'))->get();
        $income_sum = Payments::whereMonth('date', Carbon::now()->format('m'))->sum('total');

        return view('reports.income_report.report_index', compact('income', 'income_sum'));
    }
}
