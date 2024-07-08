<div class="page-wrapper">
    <div class="flex flex-col gap-3 md:flex-row md:justify-between">
        <label class="input input-bordered flex items-center gap-2">
            <x-tabler-search />
            <input type="search" class="grow" placeholder="Pencarian" wire:model.live="search" />
        </label>
        <button class="btn btn-primary" wire:click="$dispatch('createMenu')">
            <x-tabler-plus class="size-5" />
            <span>Tambah Menu</span>
        </button>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="flex gap-3 items-center">
                                <div class="avatar">
                                    <div class="w-12 rounded-lg">
                                        <img src="{{ $menu->gambar }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="font-bold">{{ $menu->name }}</div>
                                    <div class="font-light">{{ $menu->type }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $menu->harga }}</td>
                        <td>{{ $menu->desc }}</td>
                        <td>
                            <button class="btn btn-xs btn-square"
                                wire:click="$dispatch('editMenu', {menu : {{ $menu->id }}})">
                                <x-tabler-edit class="size-4" />
                            </button>
                            <button class="btn btn-xs btn-square"
                                wire:click="$dispatch('deleteMenu', {menu : {{ $menu->id }}})">
                                <x-tabler-trash class="size-4" />
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $menus->links() }}
    </div>
    @livewire('menu.actions')
</div>
