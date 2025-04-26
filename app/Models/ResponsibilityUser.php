<?php

namespace App\Models;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsibilityUser extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'responsibility_user';

    protected $fillable = [
        'user_id',
        'responsibility_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responsibility()
    {
        return $this->belongsTo(Responsibility::class);
    }

}
