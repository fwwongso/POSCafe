<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Models\Customer;
use App\Models\Menu;
use Livewire\Component;

class Actions extends Component
{
    public $search;
    public $items = [];
    public TransaksiForm $form;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function addItem(Menu $menu)
    {
        if (isset($this->items[$menu->name])) {
            $item = $this->items[$menu->name];
            $this->items[$menu->name] = [
                'qty' => $item['qty'] + 1,
                'price' => $item['price'] + $menu->price
            ];
        } else {
            $this->items[$menu->name] = [
                'qty' => 1,
                'price' => $menu->price
            ];
        }
    }

    public function removeItem($key)
    {
        $item = $this->items[$key];

        if ($item['qty'] > 1) {
            $hargasatuan = $item['price'] / $item['qty'];
            $qtybaru = $item['qty'] - 1;

            $this->items[$key]['qty'] = $qtybaru;
            $this->items[$key]['price'] = $hargasatuan * $qtybaru;
        } else {
            unset($this->items[$key]);
        }
    }

    public function getTotalHarga()
    {
        $prices = array_column($this->items, 'price');

        return array_sum($prices);
    }

    public function simpan()
    {

        $this->validate([
            'items' => 'required',
        ]);

        $this->form->items = $this->items;
        $this->form->price = $this->getTotalHarga();

        $this->form->store();
        $this->items = [];

        // $this->redirect(route('transaksi.index'), true);
    }

    public function render()
    {
        return view('livewire.transaksi.actions', [
            'menus' => Menu::when($this->search, function ($menu) {
                $menu->where('name', 'like', '%' . $this->search . '%')->orWhere('type', 'like', '%' . $this->search . '%')->orWhere('desc', 'like', '%' . $this->search . '%');
            })->get()->groupBy('type'),
            'customers' => Customer::pluck('name', 'id'),
        ]);
    }
}
