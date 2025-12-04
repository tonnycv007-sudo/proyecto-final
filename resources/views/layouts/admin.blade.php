{{-- Toma los parametros del dashboard --}}
@props([
    'title' => config('app.name', 'Veterinaria'),
    'breadcrumbs' => [],
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://kit.fontawesome.com/f05834f7d2.js" crossorigin="anonymous"></script>

    <wireui:scripts/>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-sky-50 to-emerald-50 min-h-screen">

    {{-- NAVBAR --}}
    @include('layouts.includes.admin.navigation')

    {{-- SIDEBAR --}}
    @include('layouts.includes.admin.sidebar')

    {{-- MAIN CONTAINER --}}
    <div class="p-4 sm:ml-64">

        {{-- BREADCRUMB + ACCIONES --}}
        <div class="mt-16 flex items-center justify-between w-full mb-4">
            @include('layouts.includes.admin.breadcrumb')
            {{ $actions ?? '' }}
        </div>

        {{-- CONTENIDO ENVUELTO EN TARJETA --}}
        <div class="rounded-2xl bg-white/90 shadow-sm border border-emerald-100 p-6 mb-6">
            {{ $slot }}
        </div>

    </div>

    @stack('modals')
    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SWEET ALERT DE LARAVEL --}}
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif

    <script>
        // Confirmación para formularios de eliminación
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e){
                e.preventDefault();

                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás revertir estos cambios",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, eliminar!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</body>
</html>
