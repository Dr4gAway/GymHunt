<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Follower extends Model
{
    use HasFactory;

    //protected $primaryKey = ['user_id', 'follower'];

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
        return $this->belongsTo(User::class, 'follower');
    }
}
