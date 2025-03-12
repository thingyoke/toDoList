<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check URL hash to scroll to the target section
            if (window.location.hash) {
                const target = document.querySelector(window.location.hash);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });

        function handleCompletionToggle(taskId, isCompleted) {
            if (isCompleted) {
                window.location.hash = 'finished-tasks';
            } else {
                window.location.hash = 'unfinished-tasks';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>

        <a href="{{ route('tasks.create') }}" class="create-btn">Create New Task</a>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <!-- Unfinished Tasks -->
        <div id="unfinished-tasks">
            <h2>Unfinished Tasks</h2>
            <table class="task-table">
                <thead>
                    <tr>
                        <th>Task Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    @if (!$task->is_completed)
                    <tr id="task-{{ $task->id }}">
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" 
                               class="{{ $task->is_completed ? 'completed' : '' }}">
                                {{ $task->title }}
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('tasks.toggleCompletion', $task->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="done-btn" onclick="handleCompletionToggle({{ $task->id }}, true)">
                                    Mark as Done
                                </button>
                            </form>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Finished Tasks -->
        <div id="finished-tasks">
            <h2>Finished Tasks</h2>
            <table class="task-table">
                <thead>
                    <tr>
                        <th>Task Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    @if ($task->is_completed)
                    <tr id="task-{{ $task->id }}">
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" 
                               class="{{ $task->is_completed ? 'completed' : '' }}">
                                {{ $task->title }}
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('tasks.toggleCompletion', $task->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="done-btn" onclick="handleCompletionToggle({{ $task->id }}, false)">
                                    Undo
                                </button>
                            </form>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
