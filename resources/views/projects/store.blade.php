@extends('layouts.layout')

@section('content')
<h2>{{ $projects->name }}</h2>

<h4>Invoices</h4>
<form method="POST" action="{{ route('projectss.invoices.store', $projects) }}">
    @csrf
    <div class="mb-3">
        <input type="number" step="0.01" name="amount" class="form-control" placeholder="Amount" required>
    </div>
    <button class="btn btn-success">Add Invoice</button>
</form>

<ul class="mt-3">
    @foreach($projects->invoices as $invoice)
        <li>${{ $invoice->amount }}</li>
    @endforeach
</ul>

<hr>

<h4>Expenses</h4>
<form method="POST" action="{{ route('projectss.expenses.store', $projects) }}">
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
    @foreach($projects->expenses as $expense)
        <li>{{ $expense->category }}: ${{ $expense->amount }}</li>
    @endforeach
</ul>

<hr>

<h4>Gross Profit: ${{ $projects->gross_profit }}</h4>
<a href="{{ route('projectss.index') }}" class="btn btn-secondary mt-3">Back to Projectss</a>
@endsection