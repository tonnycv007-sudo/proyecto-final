<x-admin-layout 
    title="Crear Rol | Healthify" 
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Roles', 'href' => route('admin.roles.index')],
        ['name' => 'Crear'],
    ]">

    <x-wire-card>

        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            <x-wire-input 
                label="Nombre del rol"
                name="name"
                placeholder="Ej: Administrador"
                value="{{ old('name') }}"
            />

            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue>
                    Crear rol
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
