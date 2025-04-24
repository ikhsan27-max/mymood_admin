<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);
        return view('quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('quotes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
        ]);

        Quote::create($request->only('content', 'author'));

        return redirect()->route('quotes.index')->with('success', 'Quote berhasil ditambahkan.');
    }

    public function show(Quote $quote)
    {
        return view('quotes.show', compact('quote'));
    }

    public function edit(Quote $quote)
    {
        return view('quotes.edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
        ]);

        $quote->update($request->only('content', 'author'));

        return redirect()->route('quotes.index')->with('success', 'Quote berhasil diperbarui.');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('quotes.index')->with('success', 'Quote berhasil dihapus.');
    }
}
