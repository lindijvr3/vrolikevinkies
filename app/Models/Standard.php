<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Standard extends Model
{
    use HasFactory;

    protected $fillament = [
        'name', 'class_number',
    ];

    protected $guarded = [];

    public function students():hasMany
    {
        return $this->hasMany(related: Student::class);
    }
}
