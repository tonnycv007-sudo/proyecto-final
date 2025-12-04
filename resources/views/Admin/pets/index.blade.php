<x-admin-layout 
    title="Mascotas | Healthify"
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Mascotas'],
    ]">

    <x-wire-card>
        <div class="flex justify-end mb-4">
            <x-wire-button href="{{ route('admin.pets.create') }}" blue>
                <i class="fa-solid fa-plus"></i> Nueva Mascota
            </x-wire-button>
        </div>

        {{-- Livewire Table --}}
        @livewire('admin.datatables.pet-table')

    </x-wire-card>

</x-admin-layout>
