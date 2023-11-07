<?php

namespace App\Models;

use App\Enums\BookingStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Vinkla\Hashids\Facades\Hashids;
use willvincent\Rateable\Rateable;

class Booking extends Model
{
    use HasFactory, Rateable; // Trait

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
        'note',
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

    /**
     * Check booking có th được hủy hay không
     * @return bool
     */
    public function canCancel(): bool
    {
        return $this->status === BookingStatus::PENDING;
    }

    /**
     * @return bool
     */
    public function canPay()
    {
        return $this->status !== BookingStatus::CANCELED && $this->status !== BookingStatus::CHECKED_OUT;
    }

    /**
     * @return bool
     */
    public function canRate()
    {
        return $this->status === BookingStatus::CHECKED_OUT;
    }
}
