<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'start',
        'to',
        'notes',
        'file',
        'employee_id',
        'acting_employee_id',
        ];


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function calculateTotalDaysExcludingFridays()
    {
        $start = Carbon::createFromFormat('Y-m-d', $this->start);
        $to = Carbon::createFromFormat('Y-m-d', $this->to);

        $totalDays = 0;

        // Loop through each day between $from and $to, including $to
        while ($start->lte($to)) {
            // Check if the current day is not a Friday (5 is the numeric representation of Friday)
            if ($start->dayOfWeek != Carbon::FRIDAY) {
                // Increment the total days if it's not a Friday
                $totalDays++;
            }
            // Move to the next day
            $start->addDay();
        }

        return $totalDays;
    }


    public function getTotalDaysExcludingFridays()
    {
        // Get all vacations for this employee
        $vacations = $this->vacations;

        // Check if vacations are not null
        if ($vacations) {
            $totalDays = 0;

            // Loop through each vacation and calculate total days excluding Fridays
            foreach ($vacations as $vacation) {
                $totalDays += $vacation->calculateTotalDaysExcludingFridays();
            }

            return $totalDays;
        } else {
            // If no vacations are found, return 0
            return 0;
        }
    }

    public function typeVaction()
    {
        // تحقق مباشرة مما إذا كانت القيمة المعرفة باسم "type_blood" تساوي 1
        if ($this->type == 'satisfying') {
            echo "مرضى";
        } elseif ($this->type == 'emergency') {
            echo "عارضه";
        } elseif ($this->type == 'regular') {
            echo "إعتيادى";
        } elseif ($this->type == 'Annual') {
            echo "سنوى";
        } elseif ($this->type == 'mission') {
            echo "مأمورية";
        }
    }

    public function jobgrade()
    {
        return $this->belongsTo(JobGrade::class, 'job_grades_id');
    }
    // public function employees()
    // {
    //     return $this->hasMany(Employee::class, 'employee_id');
    // }

    public function vacationEmployee()
    {
        return $this->belongsToMany(Employee::class, 'employee_vacation');
    }



      // العلاقة مع جدول EmployeeVacation كقائم بأعمال
   public function actingEmployeeVacations(): HasMany
   {
       return $this->hasMany(Employee::class, 'acting_employee_id');
   }


    // Mutator for the 'start' attribute
    // public function setStartAttribute($value)
    // {
    //     $this->attributes['start'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    // }

    // Mutator for the 'to' attribute
    // public function setToAttribute($value)
    // {
    //     $this->attributes['to'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    // }


}
