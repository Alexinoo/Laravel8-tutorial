<?php

namespace App\DataTables;

use App\Models\Pupil;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PupilDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'pupil.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pupil $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pupil $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('pupil-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip') - Commented out by Alex
            ->orderBy(1)
            // ->buttons(      -commented out by Alex
            //     Button::make('create'), -commented out by Alex
            //     Button::make('export'),-commented out by Alex
            //     Button::make('print'),-commented out by Alex
            //     Button::make('reset'),-commented out by Alex
            //     Button::make('reload')-commented out by Alex
            // )
        ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // ============commented by Alex

            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            'id',
            'name',
            'email',
            'phone',
            'salary',
            'department',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Pupil_' . date('YmdHis');
    }
}
