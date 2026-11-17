<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'city',
    'address',
])]
class Cinema extends Model
{
    /**
     * @return HasMany<Studio, $this>
     */
    public function studios(): HasMany
    {
        return $this->hasMany(Studio::class);
    }
}
