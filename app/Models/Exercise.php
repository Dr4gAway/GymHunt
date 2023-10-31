<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameExerc',
        'serie',
        'rep',
        'carga',
        'data',
    ];

    public function groupMusc(): BelongsTo
   {
       return $this->belongsTo(GroupMusc::class, 'nameExerc');
   }
}
