@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
<form method="POST" action="{{isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset

    <div class="form-group">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" value="{{$task->title ?? old('title')}}"
            class="form-input @error('title') border-red-500 @enderror px-4 py-3">
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" rows="3"
            class="form-input @error('description') border-red-500 @enderror px-4 py-3 leading-relaxed">{{$task->description ?? old('description')}}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="long_description" class="form-label">Long Description</label>
        <textarea name="long_description" id="long_description" rows="6"
            class="form-input @error('long_description') border-red-500 @enderror px-4 py-3 leading-relaxed">{{$task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
            <p class="mt-1 text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-4">
        <a href="{{ route('tasks.index') }}" class="btn-secondary">Cancel</a>
        <button type="submit" class="btn">
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
        </button>
    </div>
</form>
@endsection
