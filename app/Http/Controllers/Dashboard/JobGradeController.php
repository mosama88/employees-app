<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JobGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\JobGradeRequest;

class JobGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobgrades = JobGrade::orderBy('created_at', 'desc')->get();
        return view('dashboard.jobgrades.index', compact('jobgrades'));
    }


    public function create()
    {
        return view('dashboard.jobgrades.add',);
    }

    public function store(JobGradeRequest $request)
    {
        try {
            $jobgrade = new JobGrade();
            $jobgrade->name = $request->name;
            $jobgrade->num_of_day = $request->num_of_day;

            $jobgrade->save();

            // Return a JSON response indicating success
            return response()->json(['success' => true, 'message' => 'تم أضافة الدرجه الوظيفية بنجاح', 'jobgrade' => $jobgrade]);
        } catch (\Exception $e) {
            // Return a JSON response indicating failure
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء أضافة الدرجه الوظيفية']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $jobgrade = JobGrade::find($id);
        return view('dashboard.jobgrades.edit', ['jobgrade'=>$jobgrade ]);
    }


    public function update(JobGradeRequest $request)
    {
        try {
        $jobgrade = JobGrade::findOrFail($request->id);
        $jobgrade->name = $request->name;
        $jobgrade->num_of_day = $request->num_of_day;
        $jobgrade->save();
        session()->flash('success', 'تم تعديل الدرجه الوظيفية بنجاح');
        return redirect()->route('dashboard.jobgrades.index');
    }
    catch (\Exception $e) {
            // Return a JSON response indicating failure
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء حذف الدرجه الوظيفية']);
        }
    
    }

    public function destroy(Request $request)
    {
        try {
            // Find the job grade by its ID and delete it
            JobGrade::findOrFail($request->id)->delete();

            // Return a JSON response indicating success
            return response()->json(['success' => true, 'message' => 'تم حذف الدرجه الوظيفية بنجاح']);
        } catch (\Exception $e) {
            // Return a JSON response indicating failure
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء حذف الدرجه الوظيفية']);
        }
    }

}

