@php
    // Puedes cambiar los iconos luego a iconos veterinarios si gustas
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-paw',
            'href' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Gestión Veterinaria',
        ],
        [
            'name' => 'Roles y Permisos',
            'icon' => 'fa-solid fa-shield-dog',
            'href' => route('admin.roles.index'),
            'active' => request()->routeIs('admin.roles.*'),
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-user-doctor',
            'href' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
        ],
    ];
@endphp


<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform 
           -translate-x-full bg-white border-r border-emerald-200 sm:translate-x-0 shadow-md"
    aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">

        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)

                {{-- ==== HEADER ==== --}}
                @isset($link['header'])
                    <li class="mt-4 mb-1 px-2 text-xs font-bold uppercase tracking-wide text-emerald-600">
                        {{ $link['header'] }}
                    </li>
                @else

                    {{-- ==== LINK SIN SUBMENU ==== --}}
                    <li>
                        <a href="{{ $link['href'] }}"
                            class="flex items-center p-2 rounded-lg group transition-all duration-150
                                    {{ $link['active'] 
                                        ? 'bg-emerald-100 text-emerald-800 border border-emerald-200 font-semibold' 
                                        : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700' }}">
                            
                            {{-- ICONO --}}
                            <span class="w-6 h-6 inline-flex justify-center items-center 
                                    {{ $link['active'] ? 'text-emerald-700' : 'text-emerald-500 group-hover:text-emerald-700' }}">
                                <i class="{{ $link['icon'] }}"></i>
                            </span>

                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    </li>

                @endisset

            @endforeach
        </ul>
    </div>

</aside>
