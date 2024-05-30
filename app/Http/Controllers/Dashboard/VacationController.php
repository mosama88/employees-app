<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\JobGrade;
use App\Models\Vacation;
use App\Models\Department;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\VacationRequest;

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
        $departments = Department::all();
        return view('dashboard.vacations.add', compact('employees','departments'));
    }

    public function store(VacationRequest $request)
    {
       $vacation = new Vacation();
            $vacation->type = $request->type;
            $vacation->start = $request->start;
            $vacation->to = $request->to;
            $vacation->notes = $request->notes;
            $vacation->status = 0;
            $vacation->acting_employee_id = $request->acting_employee_id;
            $vacation->save();
            $vacation->vacationEmployee()->attach($request->employee_id);
            //Upload img
            $this->verifyAndStoreFile($request,'photo','vacations/','upload_image',$vacation->id,'App\Models\Vacation');

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
        if (!$request->has('status'))
           $request->request->add(['status' => 0]);
       else
           $request->request->add(['status' => 1]);
        $vacation = Vacation::findOrFail($request->id);
        $vacation->type = $request->type;
        $vacation->start = $request->start;
        $vacation->to = $request->to;
        $vacation->notes = $request->notes;
        $vacation->status = $request->status;;

        $vacation->acting_employee_id = $request->acting_employee_id;
        $vacation->save();
        // update pivot tABLE
        $vacation->vacationEmployee()->sync($request->employee_id);
        $vacation->save();

        // update attachment
        if ($request->has('photo')) {
            // Delete old attachment
            if ($vacation->image) {
                $old_img = $vacation->image->filename;
                $this->Delete_attachment('upload_image', 'vacations/' . $old_img, $request->id);
            }
            //Upload img
            $this->verifyAndStoreFile($request,'photo','vacations/','upload_image',$vacation->id,'App\Models\Vacation');
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
                return response()->json(['success' => 'Holiday deleted successfully']);

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
        return response()->json(['success' => 'Holiday deleted successfully']);

    }




    public function settingVacation()
    {
        $vacation = Vacation::get();
        $jobGrades = JobGrade::get();
        return view('dashboard.vacations.settings', compact('vacation', 'jobGrades'));
    }


    public function print($id)
    {
        $vacation = Vacation::findorfail($id);
        $employee = Employee::all();
        $department = Employee::all();

        return view('dashboard.vacations.print', compact('vacation','employee','department'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $type = $request->input('type');
        $employeeId = $request->input('employee_id');

        $query = Vacation::query();

        if ($searchTerm) {
            $query->where('type', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('vacationEmployee', function ($q) use ($searchTerm) {
                      $q->where('name', 'like', '%' . $searchTerm . '%');
                  });
        }

        if ($type) {
            $query->where('type', $type);
        }

        if ($employeeId) {
            $query->whereHas('vacationEmployee', function ($q) use ($employeeId) {
                $q->where('employees.id', $employeeId); // Specify the table name
            });
        }

        $vacations = $query->orderBy('created_at', 'desc')->paginate(5);
        $employees = Employee::all();

        return view('dashboard.vacations.searchvacation', [
            'vacations' => $vacations,
            'search' => $searchTerm,
            'type' => $type,
            'employee_id' => $employeeId,
            'employees' => $employees,
        ]);
    }


}


// public function search(Request $request)
// {
//     $searchTerm = $request->input('search');
//     $type = $request->input('type');

//     $query = Vacation::query();

//     if ($searchTerm) {
//         $query->where('type', 'like', '%' . $searchTerm . '%')
//             ->orWhereHas('employee', function ($q) use ($searchTerm) {
//                 $q->where('name', 'like', '%' . $searchTerm . '%');
//             });
//     }

//     if ($type) {
//         $query->where('type', $type);
//     }

//     $vacations = $query->orderBy('created_at', 'desc')->paginate(5);
//     $employees = Employee::all();

//     return view('dashboard.vacations.searchvacation', [
//         'vacations' => $vacations,
//         'search' => $searchTerm,
//         'type' => $type,
//         'employees' => $employees,
//     ]);
// }







#############################################################################################

// $vacation = Vacation::findorfail($id);
// // Find the employee by ID and eager load their associated vacations
// $employee = Employee::with('vacationEmployee')->findOrFail($id);
// $jobgrade = JobGrade::all();
// $department = Department::all();

//     return view('dashboard.vacations.print', compact('vacation','employee','jobgrade','department'));
// }
