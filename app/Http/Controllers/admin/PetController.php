<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Listado de mascotas
     */
    public function index()
    {
        $pets = Pet::latest()->paginate(10);

        return view('admin.pets.index', compact('pets'));
    }

    /**
     * Formulario para crear mascota
     */
    public function create()
    {
        return view('admin.pets.create');
    }

    /**
     * Guardar nueva mascota
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'species'   => 'required|string|max:255',
            'breed'     => 'nullable|string|max:255',
            'age'       => 'required|numeric|min:0',
        ]);

        Pet::create($validated);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Mascota registrada',
            'text'  => 'La mascota ha sido agregada correctamente.',
        ]);

        return redirect()->route('admin.pets.index');
    }

    /**
     * Formulario para editar mascota
     */
    public function edit(Pet $pet)
    {
        return view('admin.pets.edit', compact('pet'));
    }

    /**
     * Actualizar mascota
     */
    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'species'   => 'required|string|max:255',
            'breed'     => 'nullable|string|max:255',
            'age'       => 'required|numeric|min:0',

        ]);

        $pet->update($validated);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Mascota actualizada',
            'text'  => 'Los datos de la mascota se han actualizado correctamente.',
        ]);

        return redirect()->route('admin.pets.index');
    }

    /**
     * Eliminar mascota
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Mascota eliminada',
            'text'  => 'La mascota ha sido eliminada correctamente.',
        ]);

        return redirect()->route('admin.pets.index');
    }
}
