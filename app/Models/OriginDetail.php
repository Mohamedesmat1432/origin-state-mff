<?php

namespace App\Models;

use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginDetail extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'origin_details';

    protected $fillable = [
        'origin_id',
        'statement_id',
        'unit_area',
        'number_of_buildings_executed',
        'number_of_units',
        'residential_units',
        'administrative_units',
        'commercial_units',
        'commercial_shops',
        'note',
    ];

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function statement()
    {
        return $this->belongsTo(Statement::class);
    }
}
