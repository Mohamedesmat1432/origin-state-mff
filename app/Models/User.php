<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use SoftDeletes;
    use UuidTrait;
    use LoggableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'department_id',
        'job_title_id',
        'national_number',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ['profile_photo_url'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function createdOrigins()
    {
        return $this->hasMany(Origin::class, 'created_by');
    }

    public function revisedOrigins()
    {
        return $this->hasMany(Origin::class, 'revised_by');
    }

    public function completedOrigins()
    {
        return $this->hasMany(Origin::class, 'completed_by');
    }

    public function coordinatedOrigins()
    {
        return $this->hasMany(Origin::class, 'coordinated_by');
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function responsibilities()
    {
        return $this->belongsToMany(Responsibility::class, 'responsibility_user', 'user_id', 'responsibility_id')
            ->withTimestamps();
    }

    protected function name(): Attribute
    {
        return Attribute::make(get: fn(string $value) => ucwords($value));
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%");
        });
    }
}
