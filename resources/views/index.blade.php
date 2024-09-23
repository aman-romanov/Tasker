@extends('layouts.app')

@section('title', 'To-do List')
@section('content')
    
    <section x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash" class="relative max-h-lg py-2 px-3 mt-3 border-2 p-1 rounded-md border-green-500 bg-green-100">
                <strong class="text-sm text-green-800 font-bold">Success!</strong>
                <p class="text-sm text-green-800">{{session('success')}}</p>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" @click="flash = false"
                    stroke="green" class="h-5 w-5 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </span>
            </div>
        @endif
    </section>
    <section class="mt-3">
        @forelse ( $tasks as $task)
        <div class="hover:underline decoration-indigo-500"> <a href="{{ route('tasks.show',['task' => $task->id]) }}" @class(['line-through' => $task->completed])> {{$task->title}} </a></div>
        @empty
            No tasks for today! Yay!
        @endforelse
    </section>
    @if ($tasks->count())
        {{$tasks->links()}}
    @endif
@endsection