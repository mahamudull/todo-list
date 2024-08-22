<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            <input type="text" name="task" value="{{ $task->task }}" required>
            <label for="priority">Priority:</label>
            <select name="priority" id="priority" required>
                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Low</option>
                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Medium-Low</option>
                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Medium</option>
                <option value="4" {{ $task->priority == 4 ? 'selected' : '' }}>Medium-High</option>
                <option value="5" {{ $task->priority == 5 ? 'selected' : '' }}>High</option>
            </select>
            <button type="submit">Update Task</button>
        </form>
    </div>
</body>
</html>
