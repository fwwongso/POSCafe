<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Livewire\Forms\CustomerForm;

class Actions extends Component
{
    public $show = false;
    public $edit = false;
    public CustomerForm $form;

    #[On('createCustomer')]

    public function createCustomer()
    {
        $this->show = true;
    }

    #[On('editCustomer')]
    public function editCustomer(Customer $customer)
    {
        $this->form->setCustomer($customer);
        $this->edit = true;
    }

    #[On('deleteCustomer')]
    public function deleteCustomer(Customer $customer)
    {
        $customer->delete();
        $this->dispatch('reload');
    }

    public function simpan()
    {
        if (isset($this->form->customer)) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        $this->closeModal();
        $this->dispatch('reload');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->edit = false;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.customer.actions', [
            'genders' => Customer::$genders,
        ]);
    }
}
