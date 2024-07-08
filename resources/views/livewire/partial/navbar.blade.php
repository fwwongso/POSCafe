<div class="navbar bg-base-100 border-base-300 shadow-md">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-ghost btn-circle">
            <x-tabler-menu-deep class="size-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a href="{{ route('home') }}" class="" wire:navigate>
            <img src="{{ asset('logo-horizontal.svg') }}" alt="" class="h-9" fill="#291334">
        </a>
        {{-- {{ config('app.name') }} --}}
    </div>
    <div class="navbar-end">
        <a class="btn btn-ghost btn-circle" wire:navigate>
            <x-tabler-plus class="size-5" />
        </a>
    </div>
</div>
