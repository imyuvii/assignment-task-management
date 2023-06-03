@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Task
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tasks.index') }}">
                    Go Back
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            {{ $task->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $task->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Assigned To
                        </th>
                        <td>
                            {{ $task->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Project
                        </th>
                        <td>
                            {{ $task->project->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tasks.index') }}">
                    Go Back
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
