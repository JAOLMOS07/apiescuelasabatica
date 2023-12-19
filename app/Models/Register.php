<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'member_id',
        'register_type_id',
        'value'

    ];

    public function Member()
    {
        return $this->belongsTo(Member::class);
    }


    public function RegisterType()
    {
        return $this->belongsTo(RegisterType::class);
    }
}
