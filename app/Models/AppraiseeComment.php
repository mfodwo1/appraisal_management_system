<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppraiseeComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appraiser_id',
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
        return $this->belongsTo(User::class, 'appraisee_id', 'id');
    }
}
