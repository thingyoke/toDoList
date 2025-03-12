<!DOCTYPE html>
<html>

<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>

<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <table>

                <tr>
                    <td><label>Title</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="title" value="{{ $task->title }}" required></td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                </tr>
                <tr>
                    <td>
                        <textarea name="description">{{ $task->description }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
