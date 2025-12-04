<x-wire-select class="mt-3" label="Rol" name="role">
    @foreach($roles as $role)
        <x-wire-select.option 
            label="{{ $role->name }}" 
            value="{{ $role->id }}" 
            :selected="$user->roles->first()?->id == $role->id"
        />
    @endforeach
</x-wire-select>
