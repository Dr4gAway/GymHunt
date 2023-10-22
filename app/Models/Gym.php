<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

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
}
