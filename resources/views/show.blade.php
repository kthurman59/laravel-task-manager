@extends('layout')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
    <p><strong>Description:</strong></p>
    <p>{{ $task->description }}</p>
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
@endsection