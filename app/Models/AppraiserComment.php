<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppraiserComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'appraisee_id',
        'comment',
        'signed',
    ];

    // relationship with the users table
    public function appraiser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'appraiser_id', 'id');
    }

    public function appraisee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
