<?php

namespace App\Http\Controllers;

use App\Models\BookmarkedRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    /**
     * Toggle bookmark for an explore recipe.
     */
    public function toggleBookmark(Request $request)
    {
        $validated = $request->validate([
            'recipe_id' => 'required|integer',
            'title' => 'required|string',
            'slug' => 'required|string',
            'image' => 'nullable|string',
            'category' => 'nullable|string',
            'time' => 'nullable|string',
            'difficulty' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $userId = Auth::id();
        $recipeId = $validated['recipe_id'];

        $existingBookmark = BookmarkedRecipe::where('user_id', $userId)
            ->where('recipe_id', $recipeId)
            ->first();

        if ($existingBookmark) {
            $existingBookmark->delete();
            return response()->json(['status' => 'removed']);
        } else {
            BookmarkedRecipe::create([
                'user_id' => $userId,
                'recipe_id' => $recipeId,
                'title' => $validated['title'],
                'slug' => $validated['slug'],
                'image' => $validated['image'] ?? null,
                'category' => $validated['category'] ?? null,
                'time' => $validated['time'] ?? null,
                'difficulty' => $validated['difficulty'] ?? null,
                'description' => $validated['description'] ?? null,
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
