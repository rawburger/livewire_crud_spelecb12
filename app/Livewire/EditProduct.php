<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
     use WithFileUploads;
    public $code = '';
    public $name = '';
    public $price = 0.00;
    public $quantity = 0;
    public $description = '';
    public $image;
    public $product;


    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->code = $this->product->code;
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->quantity = $this->product->quantity;
        $this->description = $this->product->description;


    }
    public function save() 
    {   

        $validated = $this->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $imageurl = $this->image->store('images', 'public');
            $this->product->update(
            [
                'code' => $this->code,
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'description' => $this->description,
                'image' => $imageurl,
            ]);
        }
        else {
            $this->product->update(
                [
                    'code' => $this->code,
                    'name' => $this->name,
                    'price' => $this->price,
                    'quantity' => $this->quantity,
                    'description' => $this->description
                ]);

        }
        
        session()->flash('success', 'Product updated successfully!');
        $this->redirect(route('livewire.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-product');
    }
}
