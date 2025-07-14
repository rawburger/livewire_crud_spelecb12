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
    public $image;

    public function save() {

        $validated = $this->validate([
            'code' => 'required|string|max:255|unique:products,code',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        $imageurl = null;

        if ($this->image) {
            $imageurl = $this->image->store('images', 'public');
        }
        
        Product::create(
            [
                'code' => $this->code,
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'description' => $this->description,
                'image' => $imageurl,
            ]       
        );
    session()->flash('success', 'Product created successfully.');
    $this->redirect(route('livewire.index'), navigate: true);

    }

    public function render() 
    {
        return view('livewire.create-product');
    }
}
