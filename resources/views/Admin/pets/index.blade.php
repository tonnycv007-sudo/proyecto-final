<x-admin-layout 
    title="Usuarios | Mi Veterinaria" 
    :breadcrumbs="[
        ['name' => 'Inicio', 'href' => route('admin.dashboard')],
        ['name' => 'Administración'],
        ['name' => 'Usuarios'],
    ]">

    <x-slot name="actions">
        <x-wire-button href="{{ route('admin.users.create') }}" blue>
            <i class="fa-solid fa-plus mr-2"></i>
            Agregar usuario
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.user-table')

</x-admin-layout>
