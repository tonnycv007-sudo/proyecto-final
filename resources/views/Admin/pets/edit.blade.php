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

            {{-- Para ver errores --}}
            @if ($errors->any())
                <div class="text-red-500 mb-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <x-wire-input label="Nombre" name="name" value="{{ old('name', $user->name) }}" />

            <x-wire-input class="mt-3" type="email" label="Correo electrónico" name="email" value="{{ old('email', $user->email) }}" />

            <x-wire-input class="mt-3" type="password" label="Nueva contraseña (opcional)" name="password" />

            <x-wire-input class="mt-3" label="Número de identificación" name="id_number" value="{{ old('id_number', $user->id_number) }}" />

            <x-wire-input class="mt-3" label="Teléfono" name="phone" value="{{ old('phone', $user->phone) }}" />

            <x-wire-input class="mt-3" label="Dirección" name="address" value="{{ old('address', $user->address) }}" />

            {{-- SELECT DE ROLES (envía el ID del rol) --}}
            <div class="mt-3">
                <label class="block mb-1 text-sm font-medium text-gray-700">Rol del usuario</label>
                <select name="role" class="w-full rounded border-gray-300">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ $user->roles->first()?->id === $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue>
                    Actualizar
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
