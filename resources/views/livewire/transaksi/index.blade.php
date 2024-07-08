<div class="page-wrapper">
    <div class="flex justify-between">
        <input type="date" name="" id="" class="input input-bordered" wire:model.live="date">
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
            <x-tabler-plus class="size-5" />
            <span>Tambah Transaksi</span>
        </a>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td></td>
                        <td>{{ $transaksi->created_at->diffForHumans() }}</td>
                        <td>{{ $transaksi->desc }}</td>
                        <td>{{ $transaksi->customer?->name }}</td>
                        <td>{{ $transaksi->price }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($transaksi->done)
                                wire:change="toggleDone({{ $transaksi->id }})" />
                        </td>
                        <td class="">
                            <button class="btn btn-xs btn-square"
                                wire:click="$dispatch('detailTransaksi', {transaksi: {{ $transaksi->id }}})">
                                <x-tabler-file class="size-5" />
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('transaksi.detail')
</div>
