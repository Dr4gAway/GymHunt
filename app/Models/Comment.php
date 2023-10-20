<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'body',
        'created_by',
        'post_id'
    ];

    public function user(): belongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
