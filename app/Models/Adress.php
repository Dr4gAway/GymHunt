<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\Gym;

class Adress extends Model
{
    use HasFactory;

    public function gym() : BelongsTo
    {
        return $this->belongsTo(Gym::class);
    }
}
