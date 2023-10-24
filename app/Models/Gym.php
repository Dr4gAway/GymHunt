<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Gym extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'cnpj',
        'open_schedule',
        'close_schedule',
        'city',
        'state',
        'district',
        'street',
        'number',
        'longitude',
        'latitude'
    ];

    public function adress() : HasOne
    {
        return $this->hasOne(Adress::class);
    }
    /*
     * Get the user that owns the Gym
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
