<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
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
            ->join('cases', 'cases.pt_id', '=', 'patients.id')
            ->groupBy('cases.pt_id')
            ->get();

        return view('reports.patient_report.report_index', compact('patient'));
    }

    public function reportPatientSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $patient = Patients::selectRaw("patients.*, cases.date,COUNT(cases.pt_id) as pt_id",)
                ->join('cases', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->whereBetween('date', [$startdate, $enddate])
                ->get();
        } else {
            $patient = Patients::selectRaw("patients.*, cases.date,COUNT(cases.pt_id) as pt_id",)
                ->join('cases', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->get();
        }

        return view('reports.patient_report.report_index', compact('patient'));
    }

    public function reportCase()
    {
        $cases = Cases::selectRaw("MAX(cases.date) as date, cases.pt_id, patients.name")
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->groupBy('cases.pt_id')
            ->get();

        return view('reports.case_report.report_index', compact('cases'));
    }

    public function reportCaseSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $cases = Cases::selectRaw("MAX(cases.date) as date, cases.pt_id, patients.name")
                ->join('patients', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->whereBetween('date', [$startdate, $enddate])
                ->get();
        } else {
            $cases = Cases::selectRaw("MAX(cases.date) as date, cases.pt_id, patients.name")
                ->join('patients', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->get();
        }

        return view('reports.case_report.report_index', compact('cases'));
    }

    public function reportEvaluation()
    {
        $evaluation = Evaluations::selectRaw("MAX(evaluations.id) as id, MAX(evaluations.date) as date, evaluations.created_at, evaluation_types.name as et_name, cases.pt_id, cases.doc_id, patients.pt_no, patients.name as pt_name, doctors.doc_no")
            ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
            ->join('cases', 'evaluations.c_id', '=', 'cases.id')
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->join('doctors', 'cases.doc_id', '=', 'doctors.id')
            ->groupBy('cases.pt_id')
            ->orderBy('evaluations.created_at', 'DESC')
            ->get();

        return view('reports.evaluation_report.report_index', compact('evaluation'));
    }

    public function reportEvaluationSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $evaluation = Evaluations::selectRaw("MAX(evaluations.id) as id, evaluations.date, evaluations.created_at, evaluation_types.name as et_name, cases.pt_id, cases.doc_id, patients.pt_no, patients.name as pt_name, doctors.doc_no")
                ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
                ->join('cases', 'evaluations.c_id', '=', 'cases.id')
                ->join('patients', 'cases.pt_id', '=', 'patients.id')
                ->join('doctors', 'cases.doc_id', '=', 'doctors.id')
                ->groupBy('cases.pt_id')
                ->orderBy('evaluations.created_at', 'DESC')
                ->whereBetween('evaluations.date', [$startdate, $enddate])
                ->get();
        } else {
            $evaluation = Evaluations::selectRaw("MAX(evaluations.id) as id, evaluations.date, evaluations.created_at, evaluation_types.name as et_name, cases.pt_id, cases.doc_id, patients.pt_no, patients.name as pt_name, doctors.doc_no")
                ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
                ->join('cases', 'evaluations.c_id', '=', 'cases.id')
                ->join('patients', 'cases.pt_id', '=', 'patients.id')
                ->join('doctors', 'cases.doc_id', '=', 'doctors.id')
                ->groupBy('cases.pt_id')
                ->orderBy('evaluations.created_at', 'DESC')
                ->get();
        }

        return view('reports.evaluation_report.report_index', compact('evaluation'));
    }

    public function reportEvaluationPrint($id)
    {
        $evaluation = Evaluations::find($id);

        return view('reports.evaluation_report.report_print', compact('evaluation'));
    }

    public function reportAppointment()
    {
        $appointment = Appointments::selectRaw("MAX(appointments.id) as id, MAX(appointments.date) as date, MAX(appointments.time) as time, cases.c_no, doctors.doc_no, patients.name, patients.pt_no")
            ->join('cases', 'appointments.c_id', '=', 'cases.id')
            ->join('doctors', 'appointments.doc_id', '=', 'doctors.id')
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->groupBy('cases.pt_id')
            ->whereDate('appointments.created_at', Carbon::today())
            ->get();

        return view('reports.appointment_report.report_index', compact('appointment'));
    }

    public function reportAppointmentSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $appointment = Appointments::selectRaw("MAX(appointments.id) as id, MAX(appointments.date) as date, MAX(appointments.time) as time, appointments.created_at, cases.c_no, doctors.doc_no, patients.name, patients.pt_no")
                ->join('cases', 'appointments.c_id', '=', 'cases.id')
                ->join('doctors', 'appointments.doc_id', '=', 'doctors.id')
                ->join('patients', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->whereBetween('appointments.created_at', [$startdate, $enddate])
                ->get();
        } else {
            $appointment = Appointments::selectRaw("MAX(appointments.id) as id, MAX(appointments.date) as date, MAX(appointments.time) as time, appointments.created_at, cases.c_no, doctors.doc_no, patients.name, patients.pt_no")
                ->join('cases', 'appointments.c_id', '=', 'cases.id')
                ->join('doctors', 'appointments.doc_id', '=', 'doctors.id')
                ->join('patients', 'cases.pt_id', '=', 'patients.id')
                ->groupBy('cases.pt_id')
                ->get();
        }

        return view('reports.appointment_report.report_index', compact('appointment'));
    }

    public function reportAppointmentPrint($id)
    {
        $appointment = Appointments::find($id);

        return view('reports.appointment_report.report_print', compact('appointment'));
    }

    public function reportTreatment()
    {
        $treatment = Evaluations::selectRaw("MAX(evaluations.id) as id, COUNT(cases.pt_id) as pt_id, cases.doc_id, patients.pt_no, patients.name, doctors.doc_no")
            ->join('cases', 'evaluations.c_id', '=', 'cases.id')
            ->join('patients', 'cases.pt_id', '=', 'patients.id')
            ->join('doctors', 'cases.doc_id', '=', 'doctors.id')
            ->groupBy('cases.pt_id')
            ->get();

        return view('reports.treatment_repoert.report_index', compact('treatment'));
    }

    public function reportTreatmentShow($id)
    {
        $evaluation = Evaluations::find($id);
        $cases = Cases::where('id', $evaluation->id)->first();
        $patients = Patients::where('id', $cases->pt_id)->first();
        $treatment = Cases::selectRaw("cases.disea, evaluations.detail, evaluation_types.name")
            ->join('evaluations', 'cases.id', '=', 'evaluations.c_id')
            ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
            ->where('cases.pt_id', $patients->id)
            ->get();

        return view('reports.treatment_repoert.report_show', compact('treatment', 'patients', 'evaluation'));
    }

    public function reportTreatmentPrint($id)
    {
        $evaluation = Evaluations::find($id);
        $cases = Cases::where('id', $evaluation->id)->first();
        $patients = Patients::where('id', $cases->pt_id)->first();
        $treatment = Cases::selectRaw("cases.disea, evaluations.detail, evaluation_types.name")
            ->join('evaluations', 'cases.id', '=', 'evaluations.c_id')
            ->join('evaluation_types', 'evaluations.et_id', '=', 'evaluation_types.id')
            ->where('cases.pt_id', $patients->id)
            ->get();
        $date_today = Carbon::today();

        return view('reports.treatment_repoert.report_print', compact('treatment', 'patients', 'evaluation', 'date_today'));
    }

    public function reportSupplier()
    {
        $supplier = Suppliers::selectRaw("suppliers.*, COUNT(orders.sup_id) as sup_id, orders.created_at")
            ->join('orders', 'suppliers.id', '=', 'orders.sup_id')
            ->groupBy('orders.sup_id')
            ->get();
        return view('reports.supplier_report.report_index', compact('supplier'));
    }

    public function reportSupplierSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $supplier = Suppliers::selectRaw("suppliers.*, COUNT(orders.sup_id) as sup_id, orders.created_at")
                ->join('orders', 'suppliers.id', '=', 'orders.sup_id')
                ->groupBy('orders.sup_id')
                ->whereBetween('orders.created_at', [$startdate, $enddate])
                ->get();
        } else {
            $supplier = Suppliers::selectRaw("suppliers.*, COUNT(orders.sup_id) as sup_id, orders.created_at")
                ->join('orders', 'suppliers.id', '=', 'orders.sup_id')
                ->groupBy('orders.sup_id')
                ->get();
        }
        return view('reports.supplier_report.report_index', compact('supplier'));
    }

    public function reportProduct()
    {
        $product = Products::selectRaw("products.*, product_types.name as pt_name, SUM(medicates.quantity) as usequantity")
            ->join('product_types', 'products.pt_id', '=', 'product_types.id')
            ->join('medicates', 'products.id', '=', 'medicates.p_id')
            ->groupBy('products.id', 'medicates.p_id')
            ->get();

        return view('reports.product_report.report_index', compact('product'));
    }

    public function reportExpense()
    {
        $expense = Buys::selectRaw("buys.*, orders.name, SUM(buy_details.price) as price")
            ->join('buy_details', 'buys.id', '=', 'buy_details.buy_id')
            ->join('orders', 'buys.or_id', '=', 'orders.id')
            ->groupBy('buys.date')
            ->get();

        return view('reports.expense_report.report_index', compact('expense'));
    }

    public function reportExpenseSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $expense = Buys::selectRaw("buys.*, orders.name, SUM(buy_details.price) as price")
                ->join('buy_details', 'buys.id', '=', 'buy_details.buy_id')
                ->join('orders', 'buys.or_id', '=', 'orders.id')
                ->groupBy('buys.date')
                ->whereBetween('buys.date', [$startdate, $enddate])
                ->get();
        } else {
            $expense = Buys::selectRaw("buys.*, orders.name, SUM(buy_details.price) as price")
                ->join('buy_details', 'buys.id', '=', 'buy_details.buy_id')
                ->join('orders', 'buys.or_id', '=', 'orders.id')
                ->groupBy('buys.date')
                ->get();
        }

        return view('reports.expense_report.report_index', compact('expense'));
    }

    public function reportIncome()
    {
        $income = Payments::where('status', 1)->get();
        $income_sum = Payments::where('status', 1)->sum('total');

        return view('reports.income_report.report_index', compact('income', 'income_sum'));
    }

    public function reportIncomeSearch()
    {
        if (request()->startdate || request()->enddate) {
            $startdate = Carbon::parse(request()->startdate)->toDateTimeString();
            $enddate = Carbon::parse(request()->enddate)->toDateTimeString();
            $income = Payments::where('status', 1)
                ->whereBetween('date', [$startdate, $enddate])
                ->get();
            $income_sum = Payments::where('status', 1)
                ->whereBetween('date', [$startdate, $enddate])
                ->sum('total');
        } else {
            $income = Payments::where('status', 1)
                ->get();
            $income_sum = Payments::where('status', 1)
                ->sum('total');
        }

        return view('reports.income_report.report_index', compact('income', 'income_sum'));
    }
}
