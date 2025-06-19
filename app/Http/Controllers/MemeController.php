<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;
use Illuminate\Support\Facades\Storage;

class MemeController extends Controller
{
    public function create(Meme $meme)
    {
        return view('layouts.create', compact('meme'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url',
            'description' => 'nullable|string',
            'memeImage' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $imagePath = $request->file('memeImage')->store('memes', 'public');
        Meme::create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'memeImage' => $imagePath,
        ]);
        return redirect()->route('dashboard')->with('success', 'Meme uploaded successfully!');
    }
    public function edit(Meme $meme)
    {
        return view('layouts.update', compact('meme'));
    }
    public function update(Request $request, Meme $meme)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url',
            'description' => 'nullable|string',
            'memeImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('memeImage')) {
            if ($meme->memeImage && Storage::disk('public')->exists($meme->memeImage)) {
                Storage::disk('public')->delete($meme->memeImage);
            }
            $meme->memeImage = $request->file('memeImage')->store('memes', 'public');
        }

        $meme->update([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'memeImage' => $meme->memeImage,
        ]);

        return redirect()->route('dashboard')->with('success', 'Meme updated successfully!');
    }

    public function destroy(Meme $meme)
    {
        $meme->delete(); 
        return redirect()->route('dashboard')->with('success', 'Meme deleted successfully.');
    }
}
