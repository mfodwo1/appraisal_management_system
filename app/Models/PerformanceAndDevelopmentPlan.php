<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerformanceAndDevelopmentPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'appraiser_id',
        'strength',
        'weakness',
        'recommended_training'
        ];

    public function appraisee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function appraiser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'appraiser_id', 'id');
    }

}
