<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'price',
        'description',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['summary'];

    protected function summary(): Attribute
    {
        $summary = strip_tags($this->description);

        return Attribute::make(
            get: static fn () => substr($summary, 0, 100),
        );
    }

    // 1 loai phong co nhieu phong
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
