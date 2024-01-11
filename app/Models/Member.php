<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastName',
        'email',
        'phone',
        'birthMonth',
        'birthDay',
        'satus',
        'class_id',
        'address'
    ];
    public function SchoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function Registers()
    {
        return $this->hasMany(Register::class);
    }
}
