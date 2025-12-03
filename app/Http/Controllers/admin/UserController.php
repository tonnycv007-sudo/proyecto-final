<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // VALIDACIÓN COMPLETA
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'id_number'  => 'required|numeric',
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string|max:255',
        ]);

        // REGISTRAR USUARIO
        User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'password'   => Hash::make($validated['password']),
            'id_number'  => $validated['id_number'],
            'phone'      => $validated['phone'],
            'address'    => $validated['address'],
        ]);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Usuario creado correctamente',
            'text'  => 'El usuario ha sido registrado con éxito.',
        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        if ($user->id <= 1) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'ERROR',
                'text'  => 'No se puede editar este usuario.',
            ]);

            return redirect()->route('admin.users.index');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // VALIDACIÓN
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'password'   => 'nullable|min:6',
            'id_number'  => 'required|numeric',
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string|max:255',
        ]);

        // ACTUALIZACIÓN DE CAMPOS
        $data = [
            'name'       => $request->name,
            'email'      => $request->email,
            'id_number'  => $request->id_number,
            'phone'      => $request->phone,
            'address'    => $request->address,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Usuario actualizado',
            'text'  => 'La información del usuario ha sido actualizada.',
        ]);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        if ($user->id <= 1) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'ERROR',
                'text'  => 'No se puede eliminar este usuario.',
            ]);

            return redirect()->route('admin.users.index');
        }

        $user->delete();

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Usuario eliminado',
            'text'  => 'El usuario ha sido eliminado correctamente.',
        ]);

        return redirect()->route('admin.users.index');
    }
}
