<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use \App\Models\Post as Item;
use \App\Models\PostLike;
use \App\Models\Comment;

class Post extends Component
{
    use AuthorizesRequests;
    
    public Item $post;

    public ?PostLike $liked = null;
    public int $likeCount = 0;

    public bool $showAll = false;
    public int $perPage = 5;

    public $route;

    //protected $listeners = [ 'comment::created' => '$refresh'];

    protected function getListeners() {
        return [
            'comment::created' => '$refresh',
            "post::updated{$this->post->id}" => '$refresh'
        ];
    }

    public function mount() {
        $this->getLikedStatus();
        $this->getLikesCount();

        $this->route = url()->current();
    }

    public function render(Item $post)
    {
        $this->$post = $post;
        
        return view('livewire.post');
    }
    
    public function getCommentsProperty() {
        $comments = Comment::where('post_id', $this->post->id)->latest()->paginate($this->perPage);
        return $comments;
    }

    public function incrementComments() {
        $this->perPage += 3;
    }

    public function getLikedStatus() {
        $this->liked = PostLike::where('post_id', $this->post->id)
                               ->where('user_id', Auth::id())
                               ->first();
    }

    public function getLikesCount() {
        $this->likesCount = PostLike::where('post_id', $this->post->id)
                                    ->count();
    }

    public function handleLike()
    {
        if ($this->liked)
        {
            $this->liked->delete();
        } else {
            PostLike::create([
                'user_id' => Auth::id(),
                'post_id' => $this->post->id
            ]);
        }

        $this->getLikedStatus();
        $this->getLikesCount();
    }

    public function getVerticalProperty()
    {
        if($this->postType == 1)
        {
            if (isset($this->post->images()->first()->path))
            {
                $image = $this->post->images()->first()->path;
                $size = getimagesize($image);
    
                if($size[1] > $size[0])
                {
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public function getPostTypeProperty()
    {
        $postType = 0;

        if($this->post->images->count() > 3)
        {
            return $postType = 4;
        }
        if($this->post->images->count() > 2)
        {
            return $postType = 3;
        }
        if($this->post->images->count() > 1)
        {
            return $postType = 2;
        }
        if($this->post->images->count() == 1)
        {
            return $postType = 1;
        } else {
            //Only one image
            return $postType = 0;
        }
    }

    public function handleDelete($redirect)
    {
        $this->authorize('delete', $this->post);

        $this->cleanupPostImages();
        $this->post->delete();

        if($redirect)
            return redirect()->route('feed');
        else
            $this->emitTo('timeline', 'post::deleted');
    }

    protected function cleanupPostImages()
    {
        $storage = Storage::disk('public');

        foreach($this->post->images as $image)
        {
            if(Str::contains($image->path, 'storage/'))
            {
                $path = Str::substr($image->path, 8);
                $storage->delete($path);
            }
            $image->delete();
        }
    }
}
