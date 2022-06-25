<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Cases;
use App\Models\Doctors;
use App\Models\Payments;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $casesDay = Cases::whereDate('date', Carbon::today())->count();
        $appointments = Appointments::whereDate('date', Carbon::today())->count();
        $casesMonth = Cases::whereMonth('date', Carbon::now()->format('m'))->count();
        $doctors = Doctors::all()->count();

        $payments_sum = Payments::where('date', '>', Carbon::now()->startOfWeek())
            ->where('date', '<', Carbon::now()->endOfWeek())
            ->sum('total');
        $payments = Payments::selectRaw("payments.date, SUM(payments.total) as total")
            ->groupBy('payments.date')
            ->orderBy('payments.date', 'DESC')
            ->where('payments.date', '>', Carbon::now()->startOfWeek())
            ->where('payments.date', '<', Carbon::now()->endOfWeek())
            ->get();

        $casesChart = Cases::select('id', 'date')->get()->groupBy(function ($casesChart) {
            return Carbon::parse($casesChart->date)->format('M');
        });
        $months = [];
        $monthCount = [];
        foreach ($casesChart as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }

        $productChart = Products::all();
        $productName = [];
        $productCount = [];
        foreach ($productChart as $values) {
            $productName[] = $values->name;
            $productCount[] = $values->quantity;
        }

        return view('index', compact('casesDay', 'appointments', 'casesMonth', 'doctors', 'payments', 'payments_sum', 'months', 'monthCount', 'productName', 'productCount'));
    }
}
