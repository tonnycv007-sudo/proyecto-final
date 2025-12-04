<x-admin-layout 
    title="Editar Mascota | Healthify"
    :breadcrumbs="[
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Mascotas', 'href' => route('admin.pets.index')],
        ['name' => 'Editar'],
    ]">

    <x-wire-card>

        <form action="{{ route('admin.pets.update', $pet) }}" method="POST">
            @csrf
            @method('PUT')

            <x-wire-input label="Nombre" name="name" value="{{ old('name', $pet->name) }}" />

            <x-wire-input class="mt-3" label="Especie" name="species" value="{{ old('species', $pet->species) }}" />

            <x-wire-input class="mt-3" label="Raza" name="breed" value="{{ old('breed', $pet->breed) }}" />

            <x-wire-input class="mt-3" type="number" label="Edad (años)" name="age" value="{{ old('age', $pet->age) }}" />

            <div class="flex justify-end mt-4">
                <x-wire-button type="submit" blue>
                    Actualizar
                </x-wire-button>
            </div>

        </form>

    </x-wire-card>

</x-admin-layout>
