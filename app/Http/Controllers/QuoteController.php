<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class QuoteController extends Controller
{

    public function index()
    {
        $quotes = Quote::all()->pluck('quote');
        return view('dashboard.quotes', compact('quote'));
    }
public function store(Request $request)
{
    $request->validate([
        'quote' => 'required|string|max:255',
        'author' => 'nullable|string|max:100',
    ]);

    // Debugging: Cek query yang dieksekusi
    DB::listen(function($query) {
        Log::info("Query: " . $query->sql);
    });

    Quote::create([
        'quote' => $request->quote,
        'author' => $request->author,
    ]);

    return redirect()->back()->with('success', 'Quote berhasil ditambahkan!');
}

    
}
