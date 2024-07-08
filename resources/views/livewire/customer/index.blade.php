<div class="page-wrapper">
    <div class="flex flex-col gap-3 md:flex-row md:justify-between">
        <label class="input input-bordered flex items-center gap-2">
            <x-tabler-search />
            <input type="search" class="grow" placeholder="Pencarian" wire:model.live="search" />
        </label>
        <button class="btn btn-primary" wire:click="$dispatch('createCustomer')">
            <x-tabler-plus class="size-5" />
            <span>Tambah Customer </span>
        </button>


    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->gender }}</td>
                        <td>{{ $customer->age }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <button class="btn btn-xs btn-square"
                                wire:click="$dispatch('editCustomer', {customer : {{ $customer->id }}})">
                                <x-tabler-edit class="size-4" />
                            </button>

                            <button class="btn btn-xs btn-square"
                                wire:click="$dispatch('deleteCustomer', {customer : {{ $customer->id }}})">
                                <x-tabler-trash class="size-4" />
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('customer.actions')
</div>
