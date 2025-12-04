<x-admin-layout :breadcrumbs="[
    ['name' => 'Veterinaria', 'href' => route('admin.dashboard')],
    ['name' => 'Panel General'],
]">

    <!-- ENCABEZADO -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-emerald-700 flex items-center gap-2">
            <i class="fa-solid fa-paw"></i>
            Panel Principal
        </h1>
        <p class="text-gray-600 mt-1">
            Bienvenido al sistema de gestión veterinaria.
        </p>
    </div>

    <!-- TARJETAS DEL DASHBOARD -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Usuarios --}}
        <div class="p-5 bg-white border border-emerald-100 rounded-xl shadow hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Usuarios</h2>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">
                        {{ \App\Models\User::count() }}
                    </p>
                </div>
                <div class="text-emerald-600 text-4xl">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>

        {{-- Roles --}}
        <div class="p-5 bg-white border border-emerald-100 rounded-xl shadow hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Roles</h2>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">
                        {{ Spatie\Permission\Models\Role::count() }}
                    </p>
                </div>
                <div class="text-emerald-600 text-4xl">
                    <i class="fa-solid fa-shield-dog"></i>
                </div>
            </div>
        </div>

        {{-- Placeholder: Mascotas --}}
        <div class="p-5 bg-white border border-emerald-100 rounded-xl shadow hover:shadow-md transition">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Mascotas</h2>
            <p class="text-2xl font-bold text-emerald-600 mt-1">
                {{ \App\Models\Pet::count() }}
            </p>
        </div>
        <div class="text-emerald-600 text-4xl">
            <i class="fa-solid fa-dog"></i>
        </div>
    </div>
</div>


        {{-- Placeholder: Citas --}}
        <div class="p-5 bg-white border border-emerald-100 rounded-xl shadow hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Citas</h2>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">
                        0
                    </p>
                </div>
                <div class="text-emerald-600 text-4xl">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-10 p-6 bg-emerald-50 border border-emerald-200 rounded-xl">
        <h2 class="text-xl font-semibold text-emerald-700 flex items-center gap-2">
            <i class="fa-solid fa-circle-info"></i>
            Información del sistema
        </h2>
        <p class="text-gray-700 mt-2">
            Este panel está diseñado para administrar usuarios, roles y futuras funciones de la veterinaria,
            manteniendo una interfaz clara y profesional.
        </p>
    </div>

</x-admin-layout>
