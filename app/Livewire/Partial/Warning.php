<?php

namespace App\Livewire\Partial;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Livewire\Forms\CustomerForm;

class Warning extends Component
{
    public $show = false;
    public CustomerForm $form;

    #[On('deleteCustomer')]
    public function deleteCustomer(Customer $customer)
    {
        $this->form->setCustomer($customer);
        $this->show = true;
        // $customer->delete();
        // $this->dispatch('reload');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.partial.warning');
    }
}
