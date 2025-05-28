<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('index', compact('cards'));
    }
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'cardName' => 'required',
            'description' => 'required',
            'tags' => 'nullable|string'
        ]);

        $tags = explode(',', $validated['tags']); // turn comma-separated string into array
        $tags = array_map('trim', $tags); // remove extra spaces

        $new_tags = [];
        foreach ($tags as $tag) {
            if (!empty($tag))
                $new_tags[] = $tag;
        }
        $isHighlight = $request->input('isHighlight') ? true : false;
        $cardData = [
            'name' => $validated['cardName'],
            'description' => $validated['description'],
            'tags' => $new_tags, // saved as JSON automatically
            'isHighlight' => $isHighlight
        ];


        Card::create($cardData);

        return redirect()->back()->with('success', 'Card created!');
    }
    public function edit($id)
    {
        $card = Card::findOrFail($id);
        return view('edit', compact('card'));
    }
    public function view($id)
    {
        $card = Card::findOrFail($id);
        return view('view-card', compact('card'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // $post = Post::findOrFail($id);
        // $post->update($validated);

        // return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
}
