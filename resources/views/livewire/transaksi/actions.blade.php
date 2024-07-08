<div class="page-wrapper ">
    <div class="grid gap-5 md:grid-cols-2 md:gap-6">
        <label class="input input-bordered flex items-center gap-2">
            <x-tabler-search />
            <input type="search" class="grow" placeholder="Pencarian" wire:model.live="search" />
        </label>
        <div class="card divide-y-2 divide-base-300 h-screen overflow-y-auto">

            @foreach ($menus as $type => $menu)
                <div class="card-body">
                    <h3 class="text-2xl font-bold capitalize pb-4">{{ $type }}</h3>
                    <div class="grid grid-cols-2 gap-5">
                        @foreach ($menu as $item)
                            <div class="grid grid-flow-row">
                                <button class="avatar" wire:click="addItem({{ $item->id }})">
                                    <div class="w-full rounded-lg">
                                        <img src="{{ $item->gambar }}" alt="">
                                    </div>
                                </button>
                                <span class="text-black pt-2">{{ $item->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>


        {{-- Detail Transaksi --}}
        <div class="card h-fit">
            <form class="card-body" wire:submit="simpan">
                <h3 class="card-title">Detail Transaksi</h3>

                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <th>Nama Menu</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value['qty'] }}</td>
                                    <td>{{ Number::format($value['price']) }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-square"
                                            wire:click="removeItem('{{ $key }}')">
                                            <x-tabler-minus class="size-4" />
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <select class="select select-bordered" wire:model="form.customer_id">
                    <option value="">Pilih customer</option>
                    @foreach ($customers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <textarea name="" id="" rows="3" class="textarea textarea-bordered" wire:model="form.desc">

                </textarea>
                <div class="card-actions justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs">Total Harga</div>
                        <div @class(['card-title', 'text-error' => $errors->first('items')]) wire:model="form.price">Rp.
                            {{ Number::format($this->getTotalHarga()) }}</div>
                    </div>
                    <button class="btn btn-primary">
                        <x-tabler-check class="size-5" />
                        <span>Simpan</span>
                    </button>
                </div>

            </form>


        </div>

    </div>
</div>
