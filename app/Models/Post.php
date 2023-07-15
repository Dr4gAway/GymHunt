<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    /* Get the user that owns the post
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class, 'created_by');
   }
   
   /**
    * Get all of the images for the post
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function images(): HasMany
   {
       return $this->hasMany(Image::class);
   }
}
