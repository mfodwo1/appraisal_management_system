<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'staff_id',
        'surname',
        'other_names',
        'date_of_birth',
        'diocese',
        'district',
        'sub_district',
        'first_appointment_date',
        'current_appointment_date',
        'current_grade',
        'professional_category',
        'specialty',
        'basic_qualification',
        'basic_qualification_year',
        'additional_qualification',
        'additional_qualification_year',
        'salary_level',
        'current_step',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class);

    }


}
