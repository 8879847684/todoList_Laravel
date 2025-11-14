@extends('layout')

@section('content')
<form action="{{ route('todos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
