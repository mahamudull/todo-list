<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>

        <form action="/add-task" method="POST">
            @csrf
            <input type="text" name="task" placeholder="Enter a new task" required>
            <label for="priority">Priority:</label>
            <select name="priority" id="priority" required>
                <option value="1">Low</option>
                <option value="2">Medium-Low</option>
                <option value="3">Medium</option>
                <option value="4">Medium-High</option>
                <option value="5">High</option>
            </select>
            <button type="submit">Add Task</button>
        </form>

        <ul>
            @forelse ($tasks as $task)
                <li>
                    <form action="/toggle-complete/{{ $task->id }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="
                            background-color: {{ $task->completed ? '#28a745' : '#dc3545' }}; 
                            color: white;
                            border: none;
                            padding: 5px 10px;
                            border-radius: 5px;
                        ">
                            {{ $task->completed ? 'Undo' : 'Complete' }}
                        </button>
                    </form>
                    <span style="text-decoration: {{ $task->completed ? 'line-through' : 'none' }};">
                        {{ $task->task }}
                    </span>
                    <a href="/edit-task/{{ $task->id }}" style="
                        background-color: #007bff;
                        color: white;
                        padding: 5px 10px;
                        text-decoration: none;
                        border-radius: 5px;
                    ">Edit</a>
                    <form action="/delete-task/{{ $task->id }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="
                            background-color: #dc3545;
                            color: white;
                            border: none;
                            padding: 5px 10px;
                            border-radius: 5px;
                        ">Delete</button>
                    </form>
                </li>
            @empty
                <li>No tasks found.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
