<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'booking_code',
    'user_id',
    'showtime_id',
    'total_amount',
    'payment_status',
    'payment_token',
    'expires_at',
    'is_printed',
    'printed_at',
    'printed_by',
])]
class Booking extends Model
{
    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Showtime, $this>
     */
    public function showtime(): BelongsTo
    {
        return $this->belongsTo(Showtime::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function printedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'printed_by');
    }

    /**
     * @return BelongsToMany<Seat, $this>
     */
    public function seats(): BelongsToMany
    {
        return $this->belongsToMany(Seat::class, 'booking_seats')
            ->using(BookingSeat::class)
            ->withPivot(['id', 'showtime_id', 'price'])
            ->withTimestamps();
    }

    /**
     * @return HasMany<BookingSeat, $this>
     */
    public function bookingSeats(): HasMany
    {
        return $this->hasMany(BookingSeat::class);
    }
}
