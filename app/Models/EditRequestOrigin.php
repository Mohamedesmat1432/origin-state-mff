<?php

namespace App\Models;

use App\Enums\EditRequestOriginStatus;
use App\Traits\LoggableTrait;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditRequestOrigin extends Model
{
    use HasFactory, UuidTrait, LoggableTrait;

    protected $table = 'edit_request_origins';

    protected $fillable = ['origin_id', 'user_id', 'status'];

    protected $casts = [
        'status' => EditRequestOriginStatus::class,
    ];

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('origin_id', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%")
                    ->orWhereHas('user', fn($q) => $q->where('name', 'like', "%{$search}%"));
            });
        });
    }

    public function scopeFilterByStatus($query, $status)
    {
        return $query->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        });
    }
}
