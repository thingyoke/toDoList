<!-- resources/views/tasks/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Task Details</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    <div class="container">
        <h1>{{ $task->title }}</h1>
        
        <table>
            <tr>
                <td>Description:</td>
                <td><p>{{ $task->description }}</p></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="{{ route('tasks.edit', $task->id) }}">Edit</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
