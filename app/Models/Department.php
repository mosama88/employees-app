<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch',
        'address_id',
    ];


    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
