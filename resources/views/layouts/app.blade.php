<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>To-do list</title>
</head>
<header>
    <nav class="mt-5 mb-5 border-b pb-1">
        <ul class="flex flex-row justify-start">
            <li><a class="mr-3 hover:text-indigo-700 hover:pb-2 hover:border-b-2 border-b-indigo-700" href="{{route('tasks.index')}}">Tasks</a></li>
            <li><a class="mr-3 hover:text-indigo-700 hover:pb-2 hover:border-b-2 border-b-indigo-700" href="{{route('tasks.create')}}">Create</a></li>
        </ul>
    </nav>
</header>
<body class="container mx-auto max-w-lg">
    <h1 class="text-center text-xl font-meduim uppercase">@yield('title')</h1>
    <div class="">@yield('content')<divcv>
</body>
</html>