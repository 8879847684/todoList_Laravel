@extends('layout')

@section('content')
<a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">➕ Add New</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todos as $todo)
        <tr>
            <td>{{ $todo->title }}</td>
            <td>{{ $todo->description }}</td>
            <td>
                @if ($todo->is_completed)
                    ✅ Completed
                @else
                    ⏳ Pending
                @endif
            </td>
            <td>
                <form action="{{ route('todos.toggle', $todo->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-sm btn-warning">Toggle</button>
                </form>
                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
