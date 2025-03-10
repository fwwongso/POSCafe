<div class="page-wrapper">
    <div class="grid gap-3 md:grid-cols-3 md:gap-6">
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-16 bg-warning rounded-full">
                        <x-tabler-calendar-month class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan Bulan Ini</div>
                    <div class="text-xl font-bold">Rp. {{ Number::format($monthly) }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-16 bg-warning rounded-full">
                        <x-tabler-calendar-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan Hari Ini</div>
                    <div class="text-xl font-bold">Rp. {{ Number::format($today->sum('price')) }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-16 bg-warning rounded-full">
                        <x-tabler-list-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Total Pesanan Hari Ini</div>
                    <div class="text-xl font-bold">{{ $today->count() }} Pesanan</div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                {{-- <th>No</th> --}}
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Customer</th>
                <th>Total Bayar</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        {{-- <td>{{ $data->id }}</td> --}}
                        <td>{{ $data->created_at->diffForHumans() }}</td>
                        <td>{{ $data->desc }}</td>
                        <td>{{ $data->customer?->name }}</td>
                        <td>{{ Number::format($data->price) }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($data->done)
                                wire:change="toggleDone({{ $data->id }})" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
