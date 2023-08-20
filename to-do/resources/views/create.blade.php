@extends('task.layouts.app')
@section('title', 'Task')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                Add Task
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="datetime-local" name="deadline" id="deadline" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
