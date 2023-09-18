<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'max_adults',
        'max_children',
        'hourly_price',
        'daily_price',
        'nightly_price',
        'monthly_price',
        'description',
    ];

    // 1 loai phong co nhieu phong
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
