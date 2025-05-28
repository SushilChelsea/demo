<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function submit(Request $request)
    {
        $card = Card::findOrFail($request->id);
        $card->name = $request->cardName;
        $card->tags = $request->tags;
        $card->description = $request->description;
        $card->isHighlight = $request->isHighlight;

        $tags = explode(',', $card->tags); // turn comma-separated string into array
        $tags = array_map('trim', $tags); // remove extra spaces

        $new_tags = [];
        foreach ($tags as $tag) {
            if (!empty($tag))
                $new_tags[] = $tag;
        }
        $card->tags = $new_tags;
        $card->save();
        return response()->json([
            'message' => 'card Id: ' . $request->id . ', Card Name: ' . $request->cardName . ' tags: ' . $request->tags . ', desc: ' . $request->description . ' isHighlight: ' . $request->isHighlight
        ]);
    }
    public function delete(Request $request)
    {
        $card = Card::findOrFail($request->id);
        $card->delete();
        return response()->json([
            'message' => 'Card deleted Successfully'
        ]);
    }
}
