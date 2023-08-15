<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;
use App\Models\PostLike;

class Post extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'body',
        'created_by'
    ];

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

   /**
    * Get all of the Likes for the post
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function post_likes(): HasMany
   {
       return $this->hasMany(PostLike::class);
   }

   /**
    * Get all of the comments for the post
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function comments(): HasMany
   {
       return $this->hasMany(Comment::class);
   }
}
