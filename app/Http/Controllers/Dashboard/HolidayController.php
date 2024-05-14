<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{

    public function index()
    {
        $holidays = Holiday::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('dashboard.holidays.add',);
    }

    public function store(Request $request)
    {
        try{
            $holiday = new Holiday();
            $holiday->name = $request->name;
            $holiday->from = $request->from;
            $holiday->to = $request->to;
            $holiday->save();
            session()->flash('success', 'تم أضافة العطلة بنجاح');
            return redirect()->route('dashboard.holidays.index');
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
        $holiday = Holiday::find($id);
        return view('dashboard.holidays.edit', ['holiday'=>$holiday ]);
    }


    public function update(Request $request)
    {
        $holiday = Holiday::findOrFail($request->id);
        $holiday->name = $request->name;
        $holiday->from = $request->from;
        $holiday->to = $request->to;
        $holiday->save();
        session()->flash('success', 'تم تعديل العطلة بنجاح');
        return redirect()->route('dashboard.holidays.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Find the post by its ID
        Holiday::findOrFail($request->id)->delete();

        // Return a response indicating success
        session()->flash('success', 'تم حذف العطلة بنجاح');
        return redirect()->route('dashboard.holidays.index');
    }
}
