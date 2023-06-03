@extends('layouts.admin')
@section('content')
    @can('task_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.tasks.create') }}">
                    Add Task
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Task List
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Task">
                    <thead>
                        <tr>
                            <th width="10"></th>
                            <th>Id</th>
                            <th>Task Name</th>
                            <th>Assigned To</th>
                            <th>Project</th>
                            <th>Created Date</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr data-entry-id="{{ $task->id }}">
                                <td></td>
                                <td>{{ $task->id ?? '' }}</td>
                                <td>{{ $task->name ?? '' }}</td>
                                <td>{{ $task->user->name ?? '' }}</td>
                                <td>{{ $task->project->name ?? '' }}</td>
                                <td>{{ $task->created_at ?? '' }}</td>
                                <td>
                                    @can('task_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.tasks.show', $task->id) }}">
                                            View
                                        </a>
                                    @endcan

                                    @can('task_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.tasks.edit', $task->id) }}">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('task_delete')
                                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="Delete">
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('task_delete')
                let deleteButton = {
                    text: 'Delete Selected',
                    url: "{{ route('admin.tasks.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('Zero Selected')

                            return
                        }

                        if (confirm('Are you sure?')) {
                            $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                //orderCellsTop: true,
                order: [
                    [0, 'ASC']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Task:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

        $('.datatable-Task tbody').sortable({
            axis: 'y',
            update: function(event, ui) {
                // Get the updated order of the rows
                var order = $(this).sortable('toArray', {
                    attribute: 'data-entry-id'
                });
                console.info(order);
                // Send an AJAX request to update the order on the server
                $.ajax({
                    url: '{{ route('admin.tasks.order.update') }}',
                    method: 'POST',
                    data: { order: order },
                    headers: {
                        'x-csrf-token': _token
                    },
                    success: function(response) {
                        location.reload()
                    },
                    error: function(xhr, status, error) {
                        console.log('An error occurred while updating the order');
                    }
                });
            }
        })
    </script>
@endsection
