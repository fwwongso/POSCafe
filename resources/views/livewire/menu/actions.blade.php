<div>
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="text-lg font-bold">Form Input Menu</h3>
            <div class="py-4 space-y-3">
                <div class="flex flex-row space-x-8">
                    <div class="basis-1/2">
                        <span>Upload Gambar Menu</span>
                        <p class="text-xs font-thin">Gunakan rasio foto 1:1 dengan ukuran 10Kb dan maksimal 1Mb, Format
                            foto .jpg
                            .jpeg .png ukuran minimum 100px x 100px (Untuk gambar optimal gunakan ukuran maksimum 1000px
                            x 1000px). Maksimal 5 foto</p>
                    </div>
                    <label for="pickphoto" class="avatar">
                        <div class="w-32 rounded-xl">
                            <img class="" src="{{ $photo ? $photo->temporaryUrl() : url('noimages.png') }}" />
                        </div>
                    </label>
                    <input type="file" class="hidden" id="pickphoto" wire:model="photo">
                </div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Nama Menu</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.name'),
                    ]) wire:model="form.name" />
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Harga Menu</span>
                    </div>
                    <input type="text" placeholder="Type here" @class([
                        'input input-bordered',
                        'input-error' => $errors->first('form.price'),
                    ])
                        wire:model="form.price" />
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Tipe Menu</span>
                    </div>
                    <select @class([
                        'select select-bordered',
                        'select-error' => $errors->first('form.type'),
                    ]) wire:model="form.type">
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Deskripsi</span>
                    </div>
                    <textarea name="" id="" rows="5" placeholder="Tulis keterangan menu disini"
                        @class([
                            'textarea textarea-bordered',
                            'input-error' => $errors->first('form.desc'),
                        ]) wire:model="form.desc"></textarea>
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
