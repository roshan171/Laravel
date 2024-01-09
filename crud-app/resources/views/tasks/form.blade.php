{{-- resources/views/tasks/form.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
        @csrf
        @if(isset($task))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Task Title:</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', isset($task) ? $task->title : '') }}" >
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description">{{ old('description', isset($task) ? $task->description : '') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', isset($task) ? $task->email : '') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', isset($task) ? $task->phone : '') }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status">
                <option value="">Select Status</option>
                <option value="pending" {{ (old('status', isset($task) ? $task->status : '') == 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ (old('status', isset($task) ? $task->status : '') == 'completed') ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Update' : 'Create' }} Task</button>
    </form>
</div>
@endsection
