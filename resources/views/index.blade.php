@extends('layouts.app')

@section('title', 'My Task List')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <p class="text-sm text-gray-600">Manage your tasks</p>
        <a href="{{route('tasks.create')}}" class="btn">
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add Task
            </span>
        </a>
    </div>

    @forelse ($tasks as $task)
        <div class="border-b border-gray-200 py-4 flex justify-between items-center">
            <a href="{{route('tasks.show', ['task' => $task->id])}}"
                class="text-lg @if($task->completed) line-through @else text-gray-900 @endif">
                {{$task->title}}
            </a>
            <div class="flex items-center">
                @if ($task->completed)
                    <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 mr-2">
                        Completed
                    </span>
                @else
                    <span
                        class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 mr-2">
                        Pending
                    </span>
                @endif
                <a href="{{route('tasks.edit', ['task' => $task->id])}}" class="text-indigo-600 hover:text-indigo-900 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </a>
            </div>
        </div>
    @empty
        <div class="text-center py-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No tasks</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new task.</p>
            <div class="mt-6">
                <a href="{{route('tasks.create')}}" class="btn">
                    <span class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Add Task
                    </span>
                </a>
            </div>
        </div>
    @endforelse

    @if ($tasks->count())
        <div class="mt-4">
            {{$tasks->links()}}
        </div>
    @endif
@endsection
