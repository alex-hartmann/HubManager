<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return inertia('Dashboard',[
            'user' => $user,
        ]);
    }
}
