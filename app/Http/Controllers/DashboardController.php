<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);

        // Menghitung total jumlah quotes
        $totalQuotes = Quote::count();

        $totalUsers = User::count();
    
        // Mengirim quotes dan totalQuotes ke view
        return view('app', compact('quotes', 'totalQuotes', 'totalUsers'));
        
    }

    
}
