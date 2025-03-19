@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-6">
        <a href="{{route('tasks.index')}}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-500">
            <svg class="mr-2 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            Back to task list
        </a>
    </div>

    <div class="bg-gray-50 rounded-lg p-6 mb-6">
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-900 mb-2">Description</h2>
            <p class="text-gray-700 leading-relaxed">{{$task->description}}</p>
        </div>

        @if($task->long_description)
            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-900 mb-2">Details</h2>
                <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{$task->long_description}}</p>
            </div>
        @endif

        <div class="flex justify-between items-center text-sm">
            <div>
                <span class="text-gray-500">Created: </span>
                <span class="font-medium">{{ $task->created_at->format('M d, Y') }}</span>
                <span class="text-gray-400 mx-1">•</span>
                <span class="text-gray-500">Updated: </span>
                <span class="font-medium">{{ $task->updated_at->diffForHumans() }}</span>
            </div>
            <div>
                @if ($task->completed)
                    <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800">
                        <svg class="-ml-1 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3" />
                        </svg>
                        Completed
                    </span>
                @else
                    <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-sm font-medium text-yellow-800">
                        <svg class="-ml-1 mr-1.5 h-2 w-2 text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3" />
                        </svg>
                        Pending
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex gap-2">
            <a href="{{route('tasks.edit', ['task' => $task])}}" class="btn-secondary w-full sm:w-auto inline-flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                Edit
            </a>

            <form action="{{route('tasks.toggle-complete', ['task' => $task])}}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn-secondary w-full sm:w-auto inline-flex items-center justify-center">
                    @if($task->completed)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Mark as pending
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Mark as completed
                    @endif
                </button>
            </form>
        </div>

        <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger w-full sm:w-auto inline-flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                Delete
            </button>
        </form>
    </div>
@endsection
