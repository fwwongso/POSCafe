<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Customer;
use Livewire\Attributes\Validate;

class CustomerForm extends Form
{
    public $name;
    public $gender = 'Laki-laki';
    public $age;
    public $phone;
    public $address;

    public ?Customer $customer;

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;

        $this->name = $customer->name;
        $this->gender = $customer->gender;
        $this->age = $customer->age;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
    }

    public function store()
    {
        $validate = $this->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => '',
            'phone' => 'required',
            'address' => '',

        ]);

        Customer::create($validate);
        $this->reset();
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'gender' => 'required',
            'age' => '',
            'phone' => 'required',
            'address' => '',

        ]);

        $this->customer->update($validate);
        $this->reset();
    }
}
