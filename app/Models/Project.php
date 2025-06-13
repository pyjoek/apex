<?php

namespace App\Models;

use App\Models\Expense;
use App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function expenses() {
        return $this->hasMany(Expense::class);
    }

    public function getGrossProfitAttribute() {
        $totalInvoice = $this->invoices()->sum('amount');
        $totalExpense = $this->Expenses()->sum('amount');
        return $totalInvoice - $totalExpense;
    }
}
