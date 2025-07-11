<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CreateProduct extends Component
{
    use WithPagination;

    public $code = 0;
    public $name = '';
    public $price = 0.00;
    public $quantity = 0;
    public $description = '';
    public $image;

    public function render()
    {
        return view('livewire.create-product', [
            'products' => Product::paginate(10),
        ]);
    }

    public function store() {
        $validated = $this->validate([
            'code' => 'required|string|max:255|unique:products,code',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        Product::create(
            [
                'prodCode' => $this->code,
                'prodName' => $this->name,
                'prodPrice' => $this->price,
                'prodQuantity' => $this->quantity,
                'prodDescription' => $this->description,
                'prodImage' => $this->image ? $this->image->store('images', 'public') : null,
            ]
        );
    }
}
