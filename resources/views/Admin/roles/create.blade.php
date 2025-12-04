<x-admin-layout 
    title="Crear Rol | Veterinaria"
    :breadcrumbs="[
        ['name' => 'Veterinaria', 'href' => route('admin.dashboard')],
        ['name' => 'Roles', 'href' => route('admin.roles.index')],
        ['name' => 'Crear'],
    ]">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-emerald-700 flex items-center gap-2">
            <i class="fa-solid fa-paw"></i>
            Crear nuevo rol
        </h1>
        <p class="text-gray-600 mt-1">
            Asigna un nombre a este rol para administrarlo dentro del sistema de tu clínica veterinaria.
        </p>
    </div>

    <x-wire-card class="border border-emerald-100 shadow-sm">

        <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-4">
            @csrf

            <x-wire-input 
                label="Nombre del rol"
                name="name"
                placeholder="Ej: Veterinario, Recepcionista, Administrador"
                value="{{ old('name') }}"
                icon="tag"
            />

            <div class="flex justify-end pt-3">
                <x-wire-button type="submit" blue>
                    <i class="fa-solid fa-plus mr-2"></i>
                    Crear rol
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
