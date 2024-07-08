<div>
    <input type="checkbox" id="my_modal_6" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <form class="modal-box">
            <h3 class="text-lg font-bold" wire:model="form.name">
                @foreach ($Customers as $customer)
                    Menghapus {{ $customer->name }} akan menghilangkan customer tersebut secara permanen dari daftar
                    dan tidak dapat dibatalkan. Lanjutkan?
                @endforeach
            </h3>
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
