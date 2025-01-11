<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::latest()->paginate(12);
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'type' => 'required|in:Electric,Fighting,Normal,Water,Fire',
                'hp' => 'required|integer|min:1|max:999',
                'category' => 'required|max:255',
                'length' => 'required|max:255',
                'weight' => 'required|max:255',
                'attacks' => 'required|array|min:1|max:2',
                'attacks.*.name' => 'required|string|max:255',
                'attacks.*.damage' => 'required|integer|min:0',
                'attacks.*.energyCount' => 'required|integer|min:1|max:4',
                'attacks.*.description' => 'required|string',
                'weakness' => 'nullable|in:Electric,Fighting,Normal,Water,Fire',
                'resistance' => 'nullable|in:Electric,Fighting,Normal,Water,Fire',
                'retreat_cost' => 'nullable|integer|min:0|max:4',
                'description' => 'required',
                'image_url' => 'nullable|url',
                'card_number' => 'required|string|max:255',
                'artist' => 'required|string|max:255',
                'set' => 'required|string|max:255',
                'year' => 'required|string|max:4'
            ]);

            Card::create($validated);

            return redirect()->route('cards.index')
                ->with('success', 'Pokemon card created successfully!');
        } catch (\Illuminate\Session\TokenMismatchException $e) {
            return back()->with('error', 'page-expired')
                ->withInput($request->except('_token'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $card = Card::findOrFail($id);
        return view('cards.show', compact('card'));
    }

}
