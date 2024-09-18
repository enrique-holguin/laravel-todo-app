<!-- resources/views/list.blade.php -->

<h1>Todo List</h1>
@if ($errors->has('your_custom_error'))
    <p style="color:red;">{{ $errors->first('your_custom_error') }}</p>
@endif

<form action="{{ route('todo.store') }}" method="POST">
    @csrf
    <input type="text" name="task" placeholder="New Task">
    <button type="submit">Add Task</button>
</form>

<ul>
    @foreach($todos as $todo)
        <li>
            {{ $todo->task }}
            <a href="{{ route('todo.edit', $todo->id) }}">Edit</a>
            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
