<!DOCTYPE html>
<html>

<head>
    <title>Create New Task</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body>
    <div class="container">
        <h1>Create New Task</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>



            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>

            <button type="submit">Create</button>
        </form>
    </div>

</body>

</html>
