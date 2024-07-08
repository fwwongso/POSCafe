<div>
    <input type="checkbox" class="modal-toggle" @checked($edit | $show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="text-lg font-bold">
                @if ($show)
                    Form Tambah Customer
                @else
                    Form Edit Customer
                @endif
            </h3>
            <div class="py-4 space-y-3">
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama Customer</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name" />
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Jenis Kelamin</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.gender'),
                    ]) wire:model="form.gender">
                        @foreach ($genders as $gender)
                            <option value="{{ $gender }}">{{ $gender }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Usia</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'number-to-text input input-bordered',
                        'input-error' => $errors->first('form.age'),
                    ]) wire:model="form.age" />
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">No. Telp</span>
                    </div>
                    <input type="number" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.phone'),
                    ])
                        wire:model="form.phone" />
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Alamat</span>
                    </div>
                    <textarea name="" id="" rows="5" placeholder="Type here" @class([
                        'textarea textarea-bordered',
                        'input-error' => $errors->first('form.address'),
                    ])
                        wire:model="form.address"></textarea>
                </label>
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-ghost" wire:click="closeModal">Close</button>
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
