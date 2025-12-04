<x-admin-layout 
    title="Crear Usuario | VetCare"
    :breadcrumbs="[
        ['name' => 'Veterinaria', 'href' => route('admin.dashboard')],
        ['name' => 'Usuarios', 'href' => route('admin.users.index')],
        ['name' => 'Crear'],
    ]">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-emerald-700">
            Crear usuario
        </h1>
    </div>

    <x-wire-card class="border border-emerald-100 shadow-sm">

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
            @csrf

            <x-wire-input name="name" label="Nombre" />
            <x-wire-input name="email" label="Correo" />
            <x-wire-input name="password" label="Contraseña" type="password" />
            <x-wire-input name="id_number" label="Número de identificación" />
            <x-wire-input name="phone" label="Teléfono" />
            <x-wire-input name="address" label="Dirección" />

            <!-- SELECT QUE SI FUNCIONA -->
            <div>
                <label class="text-sm font-medium text-gray-700">Rol</label>
                <select name="role" class="w-full border rounded-lg p-2 mt-1">
                    <option value="">Seleccione un rol</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end pt-3">
                <x-wire-button type="submit" blue>
                    Crear usuario
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
