<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // VALIDACIÓN
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'id_number'  => 'required|numeric',
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string|max:255',
            'role'       => 'required|exists:roles,id',
        ]);

        // CREAR USUARIO
        $user = User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'password'   => Hash::make($validated['password']),
            'id_number'  => $validated['id_number'],
            'phone'      => $validated['phone'],
            'address'    => $validated['address'],
        ]);

        // ASIGNAR ROL
        $role = Role::find($validated['role']);
        $user->assignRole($role);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Usuario creado correctamente',
            'text'  => 'El usuario se registró con éxito.',
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

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
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
            'role'       => 'required|exists:roles,id',
        ]);

        // CAMPOS A ACTUALIZAR
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

        // ACTUALIZAR ROL
        $role = Role::find($request->role);
        $user->syncRoles([$role]);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Usuario actualizado',
            'text'  => 'La información del usuario se actualizó correctamente.',
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
            'text'  => 'El usuario fue eliminado correctamente.',
        ]);

        return redirect()->route('admin.users.index');
    }
}
