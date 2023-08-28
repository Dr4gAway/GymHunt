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
        $this->imageSelected = $newImages[0]['path'];
        //dd($this->imageSelected);
        $this->images = $newImages;
    }

    public function changeImage($newImage)
    {
        $this->imageSelected = $newImage;

        //dd($this->selectedImage);
    }
}
