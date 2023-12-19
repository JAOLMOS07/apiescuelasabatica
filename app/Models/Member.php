<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'birthMonth',
        'birthDay',
        'class_id'
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
