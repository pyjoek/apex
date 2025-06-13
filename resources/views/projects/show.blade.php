@extends('layout')

@section('content')
<h2>{{ $project->name }}</h2>

<h4>Invoices</h4>
<form method="POST" action="{{ route('projects.invoices.store', $project) }}">
    @csrf
    <div class="mb-3">
        <input type="number" step="0.01" name="amount" class="form-control" placeholder="Amount" required>
    </div>
    <button class="btn btn-success">Add Invoice</button>
</form>

<ul class="mt-3">
    @foreach($project->invoices as $invoice)
        <li>${{ $invoice->amount }}</li>
    @endforeach
</ul>

<hr>

<h4>Expenses</h4>
<form method="POST" action="{{ route('projects.expenses.store', $project) }}">
    @csrf
    <div class="row mb-2">
        <div class="col">
            <input type="text" name="category" class="form-control" placeholder="Category" required>
        </div>
        <div class="col">
            <input type="number" step="0.01" name="amount" class="form-control" placeholder="Amount" required>
        </div>
    </div>
    <button class="btn btn-warning">Add Expense</button>
</form>

<ul class="mt-3">
    @foreach($project->expenses as $expense)
        <li>{{ $expense->category }}: ${{ $expense->amount }}</li>
    @endforeach
</ul>

<hr>

<h4>Gross Profit: ${{ $project->gross_profit }}</h4>
<a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back to Projects</a>
@endsection