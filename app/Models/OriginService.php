<?php

namespace App\Models;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginService extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'origin_services';

    protected $fillable = [
        'origin_id',
        'type_service_id',
        'count',
    ];

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function typeService()
    {
        return $this->belongsTo(TypeService::class);
    }
}
