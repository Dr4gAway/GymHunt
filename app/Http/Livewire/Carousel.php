<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Image;

class Carousel extends Component
{
    public $images = [];

    public $imageSelected;

    protected $listeners = [
        "carousel::updated" => 'updateImages',
    ];

    public function render()
    {
        return view('livewire.carousel');
    }

    public function updateImages($newImages)
    {
        if(array_key_exists('path', $newImages))
        {
            $this->imageSelected = $newImages['path'];
            $this->images = array($newImages);
            //dd($this->images);
        }
        else
        {
            $this->imageSelected = $newImages[0]['path'];
            $this->images = $newImages;
            //dd($this->images);
        }
        //dd($this->imageSelected);
    }

    public function changeImage($newImage)
    {
        $this->imageSelected = $newImage;

        //dd($this->selectedImage);
    }
}
