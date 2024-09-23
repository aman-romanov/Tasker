@section('title', @isset($task) ? 'Edit' . $task->title : 'New Task')

@section('content')

<form action="{{isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store')}}" method="post">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="flex flex-col justify-between align-top mt-5">
        <div class="max-w-lg mb-5 flex justify-between align-top">
            <label for="title">Title</label>
            <input class="border border-slate-400 rounded-md ml-10" type="text" name="title" id="title" value="{{$task->title ?? old('title')}}">
            <br>
        </div>
        @error('title')
            <p class="ml-7 mb-3 text-sm text-center text-red-600">{{$message}}</p>
        @enderror
        <div class="max-w-lg mb-5 flex justify-between align-top">
            <label for="description">Description</label> 
            <textarea class="border border-slate-400 rounded-md ml-2" name="description" id="description" rows="3" >{{$task->description ?? old('description')}}</textarea>
            <br>
        </div>
        @error('description')
            <p class="ml-16 mb-3 text-sm text-center text-red-600">{{$message}}</p>
        @enderror 
        <div class="max-w-lg mb-5 flex justify-between align-top">
            <label for="long_description">Long description</label>
            <textarea class="border border-slate-400 rounded-md mr-7" name="long_description" id="long_description" rows="6" >{{$task->long_description ?? old('long_description')}}</textarea>
            <br>
        </div>
    </div>
    <div class="max-w-sm flex flex-row justify-between items-center">
        <button class="w-20 text-sm border-2 p-1 rounded-md border-slate-400 hover:border-green-600 hover:bg-green-200" type="submit" > {{isset($task) ? 'Edit' : 'Create' }}</button>
        <a class="text-sm text-slate-400 hover:text-indigo-700 hover:pb hover:border-b-2 border-b-indigo-700" href="{{isset($task) ? route('tasks.show', ['task' => $task->id]) : route('tasks.index')}}">Back</a>
    </div>
</form>

@endsection('content')