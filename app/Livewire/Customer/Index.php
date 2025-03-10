<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'reload' => '$refresh'
    ];

    public $no = 1;
    public $search;

    public function render()
    {
        return view('livewire.customer.index', [
            'customers' => Customer::when($this->search, function ($customer) {
                $customer->where('name', 'like', '%' . $this->search . '%')->orWhere('gender', 'like', '%' . $this->search . '%')->orWhere('phone', 'like', '%' . $this->search . '%')->orWhere('address', 'like', '%' . $this->search . '%');
            })->get(),
        ]);
    }
}
