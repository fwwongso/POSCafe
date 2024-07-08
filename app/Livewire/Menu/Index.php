<?php

namespace App\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public $no = 1;

    public $search;


    public function render()
    {
        $menus = Menu::paginate(10);

        // return view('livewire.menu.index', [
        //     'menus' => Menu::paginate(5),

        // ]);

        return view('livewire.menu.index', [
            'menus' => Menu::when($this->search, function ($menu) {
                $menu->where('name', 'like', '%' . $this->search . '%')->orWhere('type', 'like', '%' . $this->search . '%')->orWhere('desc', 'like', '%' . $this->search . '%');
            })->paginate(7),
        ]);
    }
}
