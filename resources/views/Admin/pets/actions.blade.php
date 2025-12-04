<div class="flex items-center space-x-2">

    <x-wire-button href="{{ route('admin.pets.edit', $pet) }}" blue xs>
        <i class="fa-solid fa-pen"></i>
    </x-wire-button>

    <form action="{{ route('admin.pets.destroy', $pet) }}" method="POST" class="delete-form inline">
        @csrf
        @method('DELETE')

        <x-wire-button type="submit" red xs>
            <i class="fa-solid fa-trash"></i>
        </x-wire-button>
    </form>

</div>
