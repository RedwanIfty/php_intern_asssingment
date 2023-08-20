@extends('task.layouts.app')
@section('title', 'Task')
@section('content')
    <div class="container">
        <h1>Task List</h1>
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table" id="tasklist">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->status === 0)
                            <h5 style="color: red">Incomplete</h5>
                        @else
                            <h5 style="color: green"> Complete</h5>
                        @endif
                    </td>
                    <td>
                        @if ($task->deadline)
                            {{ date('jS F Y g.i a', strtotime($task->deadline)) }}
                        @else
                            Not specified
                        @endif
                    </td>
                    <td>
                        <a href="{{route('edit',$task->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{route('change-status',$task->id)}}" class="btn btn-primary">Status</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#tasklist').DataTable(

            );
        });
    </script>
@endsection
