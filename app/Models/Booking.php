<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Vinkla\Hashids\Facades\Hashids;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'checkin',
        'checkout',
        'room_total',
        'price',
        'customer_id',
        'room_type_id',
        'adults',
        'children',
        'status',
        'money_total',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'checkin' => 'datetime',
        'checkout' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['code']; // append - them vao

    /**
     * @return BelongsToMany
     */
    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'booking_rooms')->withTimestamps();
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return BelongsTo
     */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    protected function code(): Attribute
    {
        return Attribute::make(
            get: fn () => Hashids::encode($this->id),
        );
    }

    public function canCancel()
    {
        return $this->status === BookingStatus::PENDING;
    }

    public function canPay()
    {
        return $this->status !== BookingStatus::CANCELED;
    }
}
