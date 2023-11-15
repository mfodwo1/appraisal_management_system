<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'appraiser_id',
        'hod_id',
        'name',
    ];

    // relationship with the users table
    public function appraiser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relationship with the users table
    public function hod(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }

    // relationship with the users table
    public function users(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
