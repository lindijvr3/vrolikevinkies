<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Standard;
use App\Models\Guardian;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'student_id',
        'address_1',
        'address_2',
        'standard_id'
    ];

    public function standard():BelongsTo
    {
        return $this->belongsTo(related: Standard::class);
    }

    public function guardian():BelongsToMany
    {
        return $this->belongsToMany(related: Guardian::class);
    }
}
