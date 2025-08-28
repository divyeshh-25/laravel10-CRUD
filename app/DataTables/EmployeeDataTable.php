<?php

namespace App\DataTables;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                if ($row->deleted_at == null) {
                    return "<i class='fa fa-edit m-1 text-primary' onclick='editHandler($row->id)'></i>
                    <i class='fa fa-trash text-danger' onclick='removeHandler($row->id)'></i>";
                }else{
                    return "<i class='fa fa-rotate-left text-warning' onclick='restoreHandler($row->id)'></i>
                    <i class='fa fa-trash text-danger' onclick='deleteHandler($row->id)'></i>";
                }
            })
            ->escapeColumns([]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Employee $model)
    {
        $query = $model->newQuery();
        if (isset(request()->showData) && request()->showData == 'trash') {
            $query->onlyTrashed();
        }
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('employee-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(7)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('fname'),
            Column::make('lname'),
            Column::make('sex'),
            Column::make('dob'),
            Column::make('phone'),
            Column::make('email'),
            Column::make('status'),
            Column::make('created_at'),
            Column::computed('action')
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Employee_' . date('YmdHis');
    }
}
