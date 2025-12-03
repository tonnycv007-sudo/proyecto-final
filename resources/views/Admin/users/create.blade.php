<x-admin-layout 
    title="Crear Usuario | Healthify" 
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Usuarios', 'href' => route('admin.users.index')],
        ['name' => 'Crear'],
    ]">

    <x-wire-card>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <x-wire-input label="Nombre" name="name" value="{{ old('name') }}" />

            <x-wire-input class="mt-3" type="email" label="Correo electrónico" name="email" value="{{ old('email') }}" />

            <x-wire-input class="mt-3" type="password" label="Contraseña" name="password" />

            <x-wire-input class="mt-3" label="Número de identificación" name="id_number" value="{{ old('id_number') }}" />

            <x-wire-input class="mt-3" label="Teléfono" name="phone" value="{{ old('phone') }}" />

            <x-wire-input class="mt-3" label="Dirección" name="address" value="{{ old('address') }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue>
                    Crear usuario
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
