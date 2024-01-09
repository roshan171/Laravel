{{-- resources/views/tasks/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="text-right">
            <a href="{{ route('tasks.create') }}" class="btn btn-success mt-3">Create New Task</a>
        </div>
    <div class="container mt-4">
        <h2>Task List</h2>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @php $counter = 1; @endphp
                    @forelse($tasks as $task)
                        <tr>
                        <td>{{ $counter++ }}</td>
                        <!-- <td>{{ $task->id }}</td> -->
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->email }}</td>
                            <td>{{ $task->phone }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                            
                                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
     
    </div>
@endsection
