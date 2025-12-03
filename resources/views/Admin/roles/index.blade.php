<x-admin-layout :breadcrumbs="[
    [
        'name' => 'ITMERIDA',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'DSC',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Roles',
    ],
]">
    @livewire('admin.datatables.role-table')
</x-admin-layout>