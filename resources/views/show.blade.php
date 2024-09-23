@extends('layouts.app')

@section('title', $task->title)
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
@section('content')
    <p class="mb-5 text-sm {{$task->completed ? 'text-green-400' :  'text-slate-400'}} "> {{$task->completed ? 'Task is completed' : 'Task is uncompleted'}}</p>

    <p>{{$task->description}}</p>
    @if($task->long_description)
        <p class="mt-1 text-md">{{$task->long_description}}</p>
    @endif

    <p class="mt-5 text-sm"> Created at: {{$task->created_at}} // Updated at: {{$task->updated_at}}</p>


    <section class="max-w-lg flex flex-row justify-between items-center mb-5 mt-3">
        <div class="w-max flex flex-row  justify-around">
            <form action="{{route('tasks.destroy', ['task'=> $task->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="text-sm mt-3 mr-5 border-2 rounded-md p-1 border-slate-400 hover:border-red-600 hover:bg-red-200" type="submit">Delete</button>
            </form>
            <form action="{{route('task.state', ['task' => $task]);}}" method="post">
                @csrf
                @method('PUT')
                <button class="text-sm mt-3 mr-5 border-2 p-1 rounded-md border-slate-400 {{$task->completed ? 'hover:border-slate-600' :  'hover:border-green-600'}}  {{$task->completed ? 'hover:bg-slate-200'  : 'hover:bg-green-200'}}" type="submit"> {{$task->completed ? 'Uncompleted' :  'Completed'}} </button>
            </form>
        </div>
        <div class="w-max flex flex-row">
            <a class="mr-3 mt-4 text-sm text-slate-400 hover:text-indigo-700 hover:pb hover:border-b-2 border-b-indigo-700" href="{{route('tasks.edit', ['task' => $task->id])}}">Edit</a>
            <a class="mr-3 mt-4 text-sm text-slate-400 hover:text-indigo-700 hover:pb hover:border-b-2 border-b-indigo-700" href="{{route('tasks.index')}}">Back</a>
        </div>
    </section>
@endsection