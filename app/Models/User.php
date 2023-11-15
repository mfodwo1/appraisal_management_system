<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

//    public function canAccessPanel(Panel $panel): bool
//    {
//        if ($panel->getId() === 'admin') {
//            return $this->hasRole('Admin');
//        }
//        elseif ($panel->getId() === 'appraiser') {
//            return $this->hasRole('Appraiser');
//        }
//        else{
//            return true;
//        }
//    }
    //relationship with user detail
    public function userDetail(): HasOne
    {
        return $this->hasOne(UserDetail::class);
    }

    public function performanceAssessment(): HasMany
    {
        return $this->hasMany(PerformanceAssessment::class);
    }

    //relationship with department
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }


    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'appraiser_d');
    }

    // Relationship for the child categories
    public function children(): HasOne
    {
        return $this->hasOne(User::class, 'appraiser_d');
    }

    //Performance and development plan
    public function performanceAndDevelopmentPlan(): HasOne
    {
        return $this->hasOne(PerformanceAndDevelopmentPlan::class);

    }
    //relationship with Current performance
    public function currentPerformance(): HasOne
    {
        return $this->hasOne(CurrentPerformance::class);
    }

    //relationship with appraisee comment
    public function appraiseeComment(): HasOne
    {
        return $this->hasOne(AppraiseeComment::class);
    }

    //relationship with appraiser comment
    public function appraiserComment(): HasOne
    {
        return $this->hasOne(AppraiserComment::class);
    }

    //relationship with result
    public function result(): HasOne
    {
        return $this->hasOne(Result::class);
    }
    }
