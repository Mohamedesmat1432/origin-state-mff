<?php

namespace App\Models;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LockedOrigin extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'locked_origins';

    protected $fillable = ['origin_id'];

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }
}
