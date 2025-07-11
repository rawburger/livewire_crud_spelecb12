<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $code = '';
    public $name = '';
    public $price = 0.00;
    public $quantity = 0;
    public $description = '';
    public $image = null;

    public function save() {
        $validated = $this->validate([
            'code' => 'required|string|max:255|unique:products,code',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $imageurl = $this->image->store('images');

        Product::create(
            [
                'code' => $this->code,
                'name' => $this->name,
                'price' => $this->price,
                'puantity' => $this->quantity,
                'description' => $this->description,
                'image' => $imageurl,
            ]       
        );

    }

    public function render() 
    {
        return view('livewire.create-product');
    }
}
