@if(count($breadcrumbs))

<nav class="flex mb-6" aria-label="Breadcrumb">

    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">

        @foreach ($breadcrumbs as $index => $item)

            <li class="inline-flex items-center">

                @isset($item['href'])

                    <a href="{{ $item['href'] }}"
                       class="inline-flex items-center text-emerald-700 hover:text-emerald-900 font-medium transition">

                        {{-- ICONO SOLO PARA EL PRIMER BREADCRUMB --}}
                        @if($index === 0)
                            <i class="fa-solid fa-paw text-emerald-600 mr-2"></i>
                        @endif

                        {{ $item['name'] }}
                    </a>

                @else

                    <span class="inline-flex items-center text-gray-700 font-semibold">
                        {{ $item['name'] }}
                    </span>

                @endisset

            </li>

            {{-- Separador excepto en el último --}}
            @if(!$loop->last)
                <li>
                    <i class="fa-solid fa-angle-right text-gray-400"></i>
                </li>
            @endif

        @endforeach

    </ol>
</nav>

{{-- TÍTULO AUTOMÁTICO FLOWBITE STYLE --}}
<h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2 mb-4">
    <i class="fa-solid fa-dog text-emerald-600"></i>
    {{ end($breadcrumbs)['name'] }}
</h1>

@endif
