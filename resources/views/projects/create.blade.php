@extends('layout')

@section('content')
<h2>Add New Project</h2>

<form method="POST" action="{{ route('projects.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Project Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button class="btn btn-primary">Create Project</button>
</form>

<a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back to Projects</a>
@endsection