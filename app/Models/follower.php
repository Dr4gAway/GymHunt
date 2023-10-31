<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class follower extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follower'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function follower(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
