<form action="/add-task" method="POST">
    @csrf
    <input type="text" name="task" placeholder="Enter a new task" required>
    <select name="priority" required>
        <option value="0">Low</option>
        <option value="1">Medium</option>
        <option value="2">High</option>
    </select>
    <button type="submit">Add Task</button>
</form>
