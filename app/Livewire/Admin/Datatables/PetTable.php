<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Pet;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PetTable extends DataTableComponent
{
    protected $model = Pet::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->sortable(),
            Column::make("Nombre", "name")->searchable()->sortable(),
            Column::make("Especie", "species")->sortable(),
            Column::make("Raza", "breed")->sortable(),
            Column::make("Edad", "age")->sortable(),
            Column::make("Acciones")
                  ->label(fn($row) => view('admin.pets.actions', ['pet' => $row])),
        ];
    }
}
