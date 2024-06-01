<?php

namespace App\Http\Controllers\Dashboard;
use Carbon\Carbon;
use App\Models\Address;
use App\Models\Employee;
use App\Models\JobGrade;
use App\Models\Vacation;
use App\Models\Department;
use App\Models\Appointment;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EmployeeRequest;

class EmployeeController extends Controller
{

    use UploadTrait;

    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->with('employeeAppointments')->get();
        return view('dashboard.employees.index', compact('employees'));
    }

    public function create()
    {
        $jobgrades = JobGrade::get();
        $addresses = Address::get();
        $departments = Department::get();
        $appointments = Appointment::all();
        return view('dashboard.employees.add',compact('jobgrades','addresses','departments','appointments'));
    }

    public function store(EmployeeRequest $request)
    {
        try{
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->phone = $request->phone;
            $employee->alter_phone = $request->alter_phone;
            $employee->hiring_date = $request->hiring_date;
            $employee->start_from = $request->start_from;
            $employee->num_of_days = $request->num_of_days;
            $employee->job_grades_id = $request->job_grades_id;
            $employee->address_id = $request->address_id;
            $employee->department_id = $request->department_id;
            $employee->save();
            $employee->employeeAppointments()->attach($request->appointments);

            //Upload img
            $this->verifyAndStoreImage($request,'photo','employees/','upload_image',$employee->id,'App\Models\Employee');

            // session()->flash('success', 'تم أضافة بيانات الموظف بنجاح');
            return response()->json(['success' => 'تم أضافة بيانات الموظف بنجاح']);
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the employee by ID and eager load their associated vacations
        $employee = Employee::with('vacationEmployee')->findOrFail($id);
    
        // Or if you want to load only the vacations associated with this employee:
        $vacations = $employee->vacationEmployee;
    

        
        // Pass the employee and vacations to the view
        return view('dashboard.employees.show', compact('employee', 'vacations'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $jobgrades = JobGrade::get();
        $addresses = Address::get();
        $departments = Department::get();
        $appointments = Appointment::all();
        return view('dashboard.employees.edit', compact('employee','jobgrades','addresses','departments','appointments') );
    }


    public function update(EmployeeRequest $request)
    {
        $employee = Employee::findOrFail($request->id);
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->alter_phone = $request->alter_phone;
        $employee->hiring_date = $request->hiring_date;
        $employee->start_from = $request->start_from;
        $employee->num_of_days = $request->num_of_days;
        $employee->job_grades_id = $request->job_grades_id;
        $employee->address_id = $request->address_id;
        $employee->department_id = $request->department_id;
        $employee->save();

        // update pivot tABLE
        $employee->employeeAppointments()->sync($request->appointments);
        $employee->save();

        // update photo
        if ($request->has('photo')){
            // Delete old photo
            if ($employee->image){
                $old_img = $employee->image->filename;
                $this->Delete_attachment('upload_image','employees/'.$old_img,$request->id);
            }
            //Upload img
            $this->verifyAndStoreImage($request,'photo','employees','upload_image',$request->id,'App\Models\employee');
        }


        // session()->flash('success', 'تم تعديل بيانات الموظف بنجاح');
        return response()->json(['success' => 'تم تعديل بيانات الموظف بنجاح']);
    }

    public function destroy(Request $request)
    {
        if($request->page_id == 1){

            if($request->filename){
                $this->Delete_attachment('upload_image', 'employees/'.$request->filename,$request->id, $request->filename);
            }
            {
                Employee::destroy($request->id);
                session()->flash('success', 'تم حذف الموظف بنجاح');
                return back();
            }
//----------------------------------------------
        }
        // delete selector doctor
        $delete_select_id = explode(",", $request->delete_select_id);
        foreach ($delete_select_id as $employee_id){
            $employee = Employee::findorfail($employee_id);
            if($employee->image){
                $this->Delete_attachment('upload_image','employees/'.$employee->image->filename,$employee_id,$employee->image->filename);
            }
        }

        Employee::destroy($delete_select_id);
        session()->flash('success', 'تم حذف الموظف بنجاح');
        return back();
    }



    public function appointment(Request $request)
    {
        $appointments = Appointment::get();
        $employees = Employee::orderBy('created_at', 'desc')->with('employeeAppointments')->get();

        return view('dashboard.employees.appointment', compact('appointments','employees'));
    }


    public function employeeshowvacation()
    {
        $employees = Employee::orderBy('created_at', 'desc')->with('employeeAppointments')->get();
        return view('dashboard.employees.show-vacation-employee', compact('employees'));
    }

}

