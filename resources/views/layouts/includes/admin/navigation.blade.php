<nav class="fixed top-0 z-50 w-full bg-white/95 backdrop-blur-md border-b border-emerald-200 shadow-sm">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">

        <div class="flex items-center justify-between">

            {{-- LEFT: LOGO + BOTÓN SIDEBAR --}}
            <div class="flex items-center justify-start rtl:justify-end">

                {{-- Botón para abrir el sidebar --}}
                <button data-drawer-target="logo-sidebar" 
                        data-drawer-toggle="logo-sidebar" 
                        aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-emerald-700 rounded-lg sm:hidden 
                               hover:bg-emerald-100 focus:outline-none focus:ring-2 focus:ring-emerald-300">

                    <span class="sr-only">Abrir menú</span>

                    <i class="fa-solid fa-bars text-xl"></i>
                </button>

                {{-- LOGO VETERINARIA --}}
                <a href="{{ route('admin.dashboard') }}" class="flex items-center ms-3 md:me-24">
                    <img src="{{ asset('logo_vet.png') }}" class="h-10 me-3" alt="VetCare">

                    <span class="self-center text-2xl font-bold whitespace-nowrap text-emerald-700">
                        VetCare
                    </span>
                </a>
            </div>


            {{-- RIGHT: FOTO DE PERFIL + DROPDOWN --}}
            <div class="flex items-center">
                <div class="ms-3 relative">

                    <x-dropdown align="right" width="48">

                        {{-- Trigger --}}
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-emerald-300 rounded-full shadow-sm 
                                               hover:border-emerald-500 transition">
                                    <img class="size-9 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="inline-flex items-center px-3 py-2 rounded-md text-gray-600 
                                               bg-white hover:text-emerald-700 border border-emerald-200 
                                               hover:border-emerald-400 transition">
                                    {{ Auth::user()->name }}
                                    <i class="fa-solid fa-chevron-down ms-2 text-sm"></i>
                                </button>
                            @endif
                        </x-slot>


                        {{-- Contenido del dropdown --}}
                        <x-slot name="content">

                            <div class="block px-4 py-2 text-xs text-gray-500">
                                {{ __('Cuenta') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                <i class="fa-solid fa-user text-emerald-600 mr-2"></i>
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    <i class="fa-solid fa-key text-emerald-600 mr-2"></i>
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    <i class="fa-solid fa-door-open text-red-600 mr-2"></i>
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>

                            </form>

                        </x-slot>

                    </x-dropdown>
                </div>
            </div>

        </div>
    </div>
</nav>
