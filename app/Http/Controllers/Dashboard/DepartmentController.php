<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Address;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DepartmentRequest;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::orderBy('created_at', 'desc')->paginate(5);
        $addresses = Address::all();
        return view('dashboard.departments.index', compact('departments','addresses'));

    }

    public function create()
    {
        return view('dashboard.departments.add',);
    }

    public function store(DepartmentRequest $request)
    {
        try{
            $department = new Department();
            $department->branch = $request->branch;
            $department->address_id = $request->address_id;
            $department->save();
            session()->flash('success', 'تم أضافة القسم بنجاح');
            return redirect()->route('dashboard.departments.index');
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
        $department = Department::find($id);
        $addresses = Address::all();
        return view('dashboard.departments.edit', compact('department', 'addresses'));
    }


    public function update(DepartmentRequest $request)
    {
        $department = Department::findOrFail($request->id);
        $department->branch = $request->branch;
        $department->address_id = $request->address_id;
        $department->save();
        session()->flash('success', 'تم تعديل القسم بنجاح');
        return redirect()->route('dashboard.departments.index');
    }


    public function destroy(Request $request)
    {
        // Find the post by its ID
        Department::findOrFail($request->id)->delete();

        // Return a response indicating success
        session()->flash('success', 'تم حذف القسم بنجاح');
        return redirect()->route('dashboard.departments.index');
    }
}
