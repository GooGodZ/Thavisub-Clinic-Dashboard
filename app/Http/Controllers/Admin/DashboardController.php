<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Cases;
use App\Models\Doctors;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $casesDay = Cases::whereDate('created_at', Carbon::today())->count();
        $appointments = Appointments::whereDate('date', Carbon::today())->count();
        $casesMonth = Cases::whereMonth('created_at', Carbon::now()->format('m'))->count();
        $doctors = Doctors::all()->count();

        return view('index', compact('casesDay', 'appointments', 'casesMonth', 'doctors'));
    }
}
