<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Vacation extends Model
{
    use HasFactory;
    protected $fillable =[
'type',
'start',
'to',
'notes',
    ];



    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class);
    // }


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

    public function typeVaction() {
        // تحقق مباشرة مما إذا كانت القيمة المعرفة باسم "type_blood" تساوي 1
        if ($this->type == 'satisfying') {
            echo "مرضى";
        } elseif ($this->type == 'emergency'){
            echo "عارضه";
        }elseif ($this->type == 'regular'){
            echo "إعتيادى";
        }elseif ($this->type == 'Annual'){
            echo "سنوى";
        }elseif ($this->type == 'mission'){
            echo "مأمورية";
        }
    }

    
    public function vacationEmployee()
    {
        return $this->belongsToMany(Employee::class, 'employee_vacation');
    }

}
