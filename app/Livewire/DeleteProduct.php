<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class DeleteProduct extends Component
{
    public function destroy($id)
    {
       Product::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.delete-product');
    }
}
