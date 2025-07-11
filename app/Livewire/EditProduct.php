<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class EditProduct extends Component
{

    public function update() 
    {
        $imageurl = $this->image->store('images');

        [
            'code' => $this->code,
            'name' => $this->name,
            'price' => $this->price,
            'puantity' => $this->quantity,
            'description' => $this->description,
            'image' => $imageurl,
        ];
    }

    public function render()
    {
        return view('livewire.edit-product');
    }
}
