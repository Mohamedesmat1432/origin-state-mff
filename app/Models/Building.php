<?php

namespace App\Models;

use App\Enums\BuildingStatus;
use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;


    protected $table = 'buildings';

    protected $fillable = [
        'contract_date',
        'area',
        'price',
        'disputs_reason',
        'building_status',
        'location',
        'government_id',
        'city_id',
    ];

    protected $casts = [
        'contract_date' => 'date',
        'building_status' => BuildingStatus::class,
    ];

    public function government()
    {
        return $this->belongsTo(Government::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getColumnValue(string $key): mixed
    {
        return match ($key) {
            'government_id' => $this->government?->name,
            'city_id' => $this->city?->name,
            'building_status' => '<span class="rounded ' . $this->building_status->color() . '">' . $this->building_status->label() . '</span>',
            default => e(data_get($this, $key)),
        };
    }

    public function scopeSearch($query, $search, $governmentId, $cityId)
    {
        // Basic column search
        $query->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('contract_date', 'like', "%{$search}%")
                    ->orWhere('area', 'like', "%{$search}%")
                    ->orWhere('price', 'like', "%{$search}%")
                    ->orWhere('disputs_reason', 'like', "%{$search}%")
                    ->orWhere('building_status', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%")
                    ->orWhereHas('government', fn($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('city', fn($q) => $q->where('name', 'like', "%{$search}%"));
            });
        });

        $query->when(!empty($governmentId), function ($q) use ($governmentId) {
            $q->whereHas('government', function ($q2) use ($governmentId) {
                $q2->where('id', $governmentId);
            });
        });

        $query->when(!empty($cityId), function ($q) use ($cityId) {
            $q->whereHas('city', function ($q2) use ($cityId) {
                $q2->where('id', $cityId);
            });
        });

        return $query;
    }

    public function scopeFilterByBuildingStatus($query, $status)
    {
        return $query->when($status, function ($query) use ($status) {
            $query->where('building_status', $status);
        });
    }
}
