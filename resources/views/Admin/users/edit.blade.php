<x-admin-layout 
    title="Editar Usuario | Healthify" 
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Usuarios', 'href' => route('admin.users.index')],
        ['name' => 'Editar'],
    ]">

    <x-wire-card>

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <x-wire-input label="Nombre" name="name" value="{{ old('name', $user->name) }}" />

            <x-wire-input class="mt-3" type="email" label="Correo electrónico" name="email" value="{{ old('email', $user->email) }}" />

            <x-wire-input class="mt-3" type="password" label="Nueva contraseña (opcional)" name="password" />

            <x-wire-input class="mt-3" label="Número de identificación" name="id_number" value="{{ old('id_number', $user->id_number) }}" />

            <x-wire-input class="mt-3" label="Teléfono" name="phone" value="{{ old('phone', $user->phone) }}" />

            <x-wire-input class="mt-3" label="Dirección" name="address" value="{{ old('address', $user->address) }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue>
                    Actualizar
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
