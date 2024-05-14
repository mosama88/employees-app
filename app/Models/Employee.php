<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\JobGrade;
class Employee extends Model
{
    use HasFactory;


protected $fillable =[
    'name',
    'phone',
    'alter_phone',
    'hiring_date',
    'start_from',
    'job_grades_id',
    'address_id',
    'department_id',
];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function jobgrade()
    {
        return $this->belongsTo(JobGrade::class, 'job_grades_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function vacation()
    {
        return $this->belongsTo(Vacation::class);
    }

    public function getAgeAttribute()
    {
        return now()->diffInYears($this->birth_date);
    }


}
