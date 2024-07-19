<?php
namespace App\DataTables;

use App\Models\Fileshare;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FilesentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)                                        

            ->editColumn('department_id', function (Fileshare $fileshare) {
                return ($fileshare->department != null) ? $fileshare->department->name : '-';
            })

            ->editColumn('section_id', function (Fileshare $fileshare) {
                return ($fileshare->section != null) ? $fileshare->section->name : '-';
            })
            // ->editColumn('file_id', function (Fileshare $fileshare) {
            //     return ($fileshare->filename != null) ? $fileshare->filename->file_name : '-';
            // })
            ->editColumn('file_id', function (Fileshare $fileshare) {
                $url = route('file.share', $fileshare->id);
                return '<a href="' . $url . '">' . $fileshare->filename->file_name . '</a>';
            })
            ->rawColumns(['file_id'])
            ->addColumn('action', function (Fileshare $file) {
                return view('file.action', compact('file'));
            });
    }

    public function query(Fileshare $model)
    {
        return $model->newQuery()->where('sender_id', Auth::user()->id)->orderBy('id', 'DESC');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('file-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->language([
                "paginate" => [
                    "next" => '<i class="fas fa-angle-right"></i>',
                    "previous" => '<i class="fas fa-angle-left"></i>',
                ],
            ])
            ->parameters([
                "dom" => "
                                <'row'<'col-sm-12'><'col-sm-9'B><'col-sm-3'f>>
                                <'row'<'col-sm-12'tr>>
                                <' row mt-3 container-fluid'<'col-sm-5'i><'col-sm-7'p>>
                                ",

                'buttons' => [
                    // ['extend' => 'create', 'className' => 'btn btn-primary btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'reset', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'reload', 'className' => 'btn btn-primary btn-sm no-corner'],
                    ['extend' => 'pageLength', 'className' => 'btn btn-primary btn-sm no-corner'],
                ],

                "scrollX" => true,
            ])
            ->language([
                'buttons' => [
                    // 'create' => __('Create'),
                    'export' => __('Export'),
                    'print' => __('Print'),
                    'reset' => __('Reset'),
                    'reload' => __('Reload'),
                    'excel' => __('Excel'),
                    'csv' => __('CSV'),
                    'pageLength' => __('Show %d rows'),
                ],
            ]);

    }
    protected function getColumns()
    {
        return [
            Column::make('id')
                ->title('Sl No.')
                ->render('meta.row + meta.settings._iDisplayStart + 1;')
                ->orderable(false),
            Column::make('file_id')->title('File'),
            Column::make('section_id')->title('Section'),
            Column::make('department_id')->title('Department'),
            Column::make('duedate'),
            Column::make('priority'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }
    protected function filename()
    {
        return 'file' . date('YmdHis');
    }
}
