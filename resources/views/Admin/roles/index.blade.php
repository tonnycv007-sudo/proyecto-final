<x-admin-layout 
    title="Roles | Veterinaria" 
    :breadcrumbs="[
        ['name' => 'Veterinaria', 'href' => route('admin.dashboard')],
        ['name' => 'Gestión de Usuarios'],
        ['name' => 'Roles'],
    ]">

    {{-- ENCABEZADO Y BOTÓN --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-emerald-700 flex items-center gap-2">
                <i class="fa-solid fa-shield-dog"></i>
                Roles del Sistema
            </h1>
            <p class="text-gray-600 mt-1">
                Administra los roles y permisos de tu clínica veterinaria.
            </p>
        </div>

        <x-wire-button href="{{ route('admin.roles.create') }}" blue>
            <i class="fa-solid fa-plus mr-2"></i> 
            Nuevo rol
        </x-wire-button>
    </div>

    {{-- CONTENEDOR DE TABLA --}}
    <div class="bg-white border border-emerald-100 rounded-xl shadow-sm p-6">
        @livewire('admin.datatables.role-table')
    </div>

</x-admin-layout>
