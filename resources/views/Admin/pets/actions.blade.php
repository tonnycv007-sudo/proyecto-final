<div class="flex items-center gap-2">

    {{-- Editar usuario --}}
    <x-wire-button href="{{ route('admin.users.edit', $user) }}" blue xs
        title="Editar usuario">
        <i class="fa-solid fa-user-pen"></i>
    </x-wire-button>

    {{-- Eliminar usuario --}}
    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline delete-form">
        @csrf
        @method('DELETE')

        <x-wire-button type="submit" red xs
            title="Eliminar usuario">
            <i class="fa-solid fa-user-xmark"></i>
        </x-wire-button>
    </form>

</div>
