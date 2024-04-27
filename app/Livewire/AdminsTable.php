<?php

namespace App\Livewire;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Redot\LivewireDatatable\Action;
use Redot\LivewireDatatable\Column;
use Redot\LivewireDatatable\Datatable;
use Redot\LivewireDatatable\HeaderButton;

class AdminsTable extends DataTable
{
    /**
     * Datatable title.
     */
    public string $title = 'Admins';

    /**
     * Datatable subtitle.
     */
    public string $subtitle = 'List of all admins';

    /**
     * Query builder.
     */
    public function query(): Builder
    {
        return Admin::whereNotCurrentAdmin();
    }

    /**
     * Data table header buttons.
     *
     * @return HeaderButton[]
     */
    public function headerButtons(): array
    {
        return [
            HeaderButton::create('dashboard.admins.create')
                ->allowed(route_allowed('dashboard.admins.create')),
        ];
    }

    /**
     * Data table columns.
     *
     * @return Column[]
     */
    public function columns(): array
    {
        return [
            Column::create('name')
                ->sortable()
                ->searchable(),
            Column::create('email')
                ->sortable()
                ->searchable(),
            Column::create('created_at')
                ->label('Created At')
                ->date()
                ->sortable(),
        ];
    }

    /**
     * Data table actions.
     *
     * @return Action[]
     */
    public function actions(): array
    {
        return [
            Action::edit('dashboard.admins.edit')
                ->allowed(route_allowed('dashboard.admins.edit')),
            Action::delete('dashboard.admins.destroy')
                ->allowed(route_allowed('dashboard.admins.destroy')),
        ];
    }
}
