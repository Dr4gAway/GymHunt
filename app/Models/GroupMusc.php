<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class GroupMusc extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameGroup',
        'nameExerc'
    ];

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class, 'nameExerc');
    }
}
