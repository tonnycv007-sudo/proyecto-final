<x-admin-layout 
    title="Registrar Mascota | Healthify"
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Mascotas', 'href' => route('admin.pets.index')],
        ['name' => 'Registrar'],
    ]">

    <x-wire-card>

        <form action="{{ route('admin.pets.store') }}" method="POST">
            @csrf

            <x-wire-input label="Nombre" name="name" value="{{ old('name') }}" />

            <x-wire-input class="mt-3" label="Especie" name="species" value="{{ old('species') }}" />

            <x-wire-input class="mt-3" label="Raza" name="breed" value="{{ old('breed') }}" />

            <x-wire-input class="mt-3" type="number" label="Edad (años)" name="age" value="{{ old('age') }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue>
                    Guardar Mascota
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
