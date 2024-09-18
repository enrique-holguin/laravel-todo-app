<!-- resources/views/edit.blade.php -->

<h1>Edit Task</h1>

<form action="{{ route('todo.update', $todo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="task" value="{{ $todo->task }}">
    <button type="submit">Update Task</button>
</form>