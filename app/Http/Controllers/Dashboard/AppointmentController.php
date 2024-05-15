<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('dashboard.appointments.add',compact('employees'));
    }

    public function store(Request $request)
    {
        try{
            $appointments = new Appointment();
            $appointments->name = $request->name;
            $appointments->save();
            session()->flash('success', 'تم أضافة الأجازة الاسبوعيه بنجاح');
            return redirect()->route('dashboard.appointments.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $appointment = Appointment::find($id);
        return view('dashboard.departments.edit', compact('appointment'));
    }


    public function update(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);
        $appointment->name = $request->name;
        $appointment->save();
        session()->flash('success', 'تم تعديل الأجازة الاسبوعيه بنجاح');
        return redirect()->route('dashboard.appointments.index');
    }


    public function destroy(Request $request)
    {
        // Find the post by its ID
        Appointment::findOrFail($request->id)->delete();

        // Return a response indicating success
        session()->flash('success', 'تم حذف الأجازة الاسبوعيه بنجاح');
        return redirect()->route('dashboard.appointments.index');
    }
}
