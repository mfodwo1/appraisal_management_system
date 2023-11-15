<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CurrentPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'appraiser_id',
        'quality_of_work',
        'job_knowledge',
        'initiative_resourcefulness',
        'attendance_dependability',
        'attitude_toward_work',
        ];

    public function appraisee():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
