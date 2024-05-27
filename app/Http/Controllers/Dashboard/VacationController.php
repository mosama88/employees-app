<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VacationRequest;
use App\Models\Employee;
use App\Models\JobGrade;
use App\Models\Vacation;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacationController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $vacations = Vacation::orderBy('created_at', 'desc')->with('vacationEmployee')->get();
        $employees = Employee::all();
        return view('dashboard.vacations.index', compact('vacations', 'employees'));
    }


    public function create()
    {
        $employees = Employee::all();
        return view('dashboard.vacations.add', compact('employees'));
    }

    public function store(VacationRequest $request)
    {

            $vacation = new Vacation();
            $vacation->type = $request->type;
            $vacation->start = $request->start;
            $vacation->to = $request->to;
            $vacation->notes = $request->notes;
            $vacation->save();

            $vacation->vacationEmployee()->attach($request->employee_id);
            //Upload img

            session()->flash('success', 'تم أضافة الأجازه بنجاح');
            return redirect()->route('dashboard.vacations.index');
   
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

//
    }

    public function edit($id)
    {
        $vacation = Vacation::findOrFail($id);
        $employees = Employee::all();

        return view('dashboard.vacations.edit', compact('vacation', 'employees'));
    }


    public function update(VacationRequest $request)
    {
        $vacation = Vacation::findOrFail($request->id);
        $vacation->type = $request->type;
        $vacation->start = $request->start;
        $vacation->to = $request->to;
        $vacation->notes = $request->notes;
        $vacation->save();
        // update pivot tABLE
        $vacation->vacationEmployee()->sync($request->employee_id);
        $vacation->save();

        // update attachment
        if ($request->has('attachment')) {
            // Delete old attachment
            if ($vacation->image) {
                $old_img = $vacation->image->filename;
                $this->Delete_attachment('upload_image', 'vacations/' . $old_img, $request->id);
            }
            //Upload img
            $this->verifyAndStoreImage($request, 'attachment', 'vacations', 'upload_image', $request->id, 'App\Models\Vacation');
        }


        session()->flash('success', 'تم تعديل الأجازه بنجاح');
        return redirect()->route('dashboard.vacations.index');
    }

    public function destroy(Request $request)
    {
        if ($request->page_id == 1) {

            if ($request->filename) {
                $this->Delete_attachment('upload_image', 'vacations/' . $request->filename, $request->id, $request->filename);
            }
            {
                Vacation::destroy($request->id);
                session()->flash('success', 'تم حذف الأجازة بنجاح');
                return back();
            }
//----------------------------------------------
        }
        // delete selector Vacation
        $delete_select_id = explode(",", $request->delete_select_id);
        foreach ($delete_select_id as $vacation_id) {
            $vacation = Vacation::findorfail($vacation_id);
            if ($vacation->image) {
                $this->Delete_attachment('upload_image', 'vacations/' . $vacation->image->filename, $vacation_id, $vacation->image->filename);
            }
        }

        Vacation::destroy($delete_select_id);
        session()->flash('success', 'تم حذف الأجازة بنجاح');
        return back();
    }


    function settingVacation()
    {
        $vacation = Vacation::get();
        $jobGrades = JobGrade::get();
        return view('dashboard.vacations.settings', compact('vacation', 'jobGrades'));
    }


}

