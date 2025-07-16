<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\BudgetLimit;
use App\Models\FinancialGoal;
use App\Models\User;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;

class FinancesController extends Controller
{
    public function index()
    {
        return inertia('Finances', []);
    }
}
