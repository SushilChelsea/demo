<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CardController extends Controller
{
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
}
