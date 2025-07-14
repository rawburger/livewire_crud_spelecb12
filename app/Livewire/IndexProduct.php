<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class IndexProduct extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $product = Product::find($id);
        
        if ($product) {
            $product->delete();

            session()->flash('success', 'Product deleted successfully.');
            $this->redirect(route('livewire.index'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.index', [
            'products' => Product::paginate(10),
        ]);
    }
}
