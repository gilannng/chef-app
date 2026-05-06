<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userId = auth()->id();
    
    // Hitung resep yang dibuat (jumlah pesan assistant yang memiliki recipe_data)
    $recipesCreated = \App\Models\ChatMessage::whereHas('session', function($q) use ($userId) {
        $q->where('user_id', $userId);
    })->where('sender_role', 'assistant')->whereNotNull('recipe_data')->count();

    // Hitung resep/sesi yang disimpan (bookmarked)
    $savedRecipes = \App\Models\ChatSession::where('user_id', $userId)
        ->where('is_bookmarked', true)
        ->count();

    return view('dashboard', compact('recipesCreated', 'savedRecipes'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/chat', [\App\Http\Controllers\ChatController::class, 'index'])->middleware(['auth'])->name('chat');

Route::get('/explore', function () {
    $recipes = [
        [
            'id' => 1,
            'title' => 'Salmon Panggang Lemon Asparagus',
            'category' => 'Makan Malam',
            'time' => '30 mnt',
            'difficulty' => 'Mudah',
            'description' => 'Sajian sehat dan elegan, sempurna untuk makan malam ringan yang kaya akan omega-3.',
            'image' => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?q=80&w=1200&auto=format&fit=crop',
            'slug' => 'salmon-panggang'
        ],
        [
            'id' => 2,
            'title' => 'Roti Bakar Alpukat Telur Rebus',
            'category' => 'Sarapan',
            'time' => '15 mnt',
            'difficulty' => 'Mudah',
            'description' => 'Awali hari dengan energi positif dari roti gandum utuh dan alpukat segar.',
            'image' => 'https://images.unsplash.com/photo-1525351484163-7529414344d8?q=80&w=1200&auto=format&fit=crop',
            'slug' => 'roti-bakar-alpukat'
        ],
        [
            'id' => 3,
            'title' => 'Sup Daging Rempah Nusantara',
            'category' => 'Makan Siang',
            'time' => '120 mnt',
            'difficulty' => 'Menengah',
            'description' => 'Kuah kaldu yang dimasak perlahan dengan perpaduan rempah khas Indonesia yang menghangatkan.',
            'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=1200&auto=format&fit=crop',
            'slug' => 'sup-daging-rempah'
        ],
        [
            'id' => 4,
            'title' => 'Pancake Blueberry Maple',
            'category' => 'Sarapan',
            'time' => '20 mnt',
            'difficulty' => 'Mudah',
            'description' => 'Pancake lembut dengan taburan blueberry segar dan siraman sirup maple.',
            'image' => 'https://images.unsplash.com/photo-1506084868230-bb9d95c24759?q=80&w=1200&auto=format&fit=crop',
            'slug' => 'pancake-blueberry'
        ],
        [
            'id' => 5,
            'title' => 'Tiramisu Klasik Italia',
            'category' => 'Dessert',
            'time' => '45 mnt',
            'difficulty' => 'Sulit',
            'description' => 'Kue kopi berlapis krim mascarpone lembut khas Italia yang meleleh di mulut.',
            'image' => 'https://images.unsplash.com/photo-1586040140378-b5634cb4c8cb?q=80&w=1200&auto=format&fit=crop',
            'slug' => 'tiramisu-klasik'
        ],
        [
            'id' => 6,
            'title' => 'Pasta Carbonara Autentik',
            'category' => 'Makan Siang',
            'time' => '25 mnt',
            'difficulty' => 'Menengah',
            'description' => 'Spaghetti creamy tanpa krim! Dibuat secara autentik dengan keju pecorino dan guanciale.',
            'image' => 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?q=80&w=1200&auto=format&fit=crop',
            'slug' => 'pasta-carbonara'
        ],
    ];

    $bookmarkedRecipeIds = [];
    if (auth()->check()) {
        $bookmarkedRecipeIds = \App\Models\BookmarkedRecipe::where('user_id', auth()->id())
            ->pluck('recipe_id')
            ->toArray();
    }

    return view('explore', compact('recipes', 'bookmarkedRecipeIds'));
});

Route::get('/recipe/{slug}', function ($slug) {
    $allRecipes = [
        'salmon-panggang' => [
            'title' => 'Salmon Panggang Lemon Asparagus',
            'category' => 'Makan Malam',
            'time' => '30 mnt',
            'difficulty' => 'Mudah',
            'description' => 'Sajian sehat dan elegan, sempurna untuk makan malam ringan yang kaya akan omega-3.',
            'image' => 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?q=80&w=1200&auto=format&fit=crop',
        ],
        'roti-bakar-alpukat' => [
            'title' => 'Roti Bakar Alpukat Telur Rebus',
            'category' => 'Sarapan',
            'time' => '15 mnt',
            'difficulty' => 'Mudah',
            'description' => 'Awali hari dengan energi positif dari roti gandum utuh dan alpukat segar.',
            'image' => 'https://images.unsplash.com/photo-1525351484163-7529414344d8?q=80&w=1200&auto=format&fit=crop',
        ],
        'sup-daging-rempah' => [
            'title' => 'Sup Daging Rempah Nusantara',
            'category' => 'Makan Siang',
            'time' => '120 mnt',
            'difficulty' => 'Menengah',
            'description' => 'Kuah kaldu yang dimasak perlahan dengan perpaduan rempah khas Indonesia yang menghangatkan.',
            'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=1200&auto=format&fit=crop',
        ],
        'pancake-blueberry' => [
            'title' => 'Pancake Blueberry Maple',
            'category' => 'Sarapan',
            'time' => '20 mnt',
            'difficulty' => 'Mudah',
            'description' => 'Pancake lembut dengan taburan blueberry segar dan siraman sirup maple.',
            'image' => 'https://images.unsplash.com/photo-1506084868230-bb9d95c24759?q=80&w=1200&auto=format&fit=crop',
        ],
        'tiramisu-klasik' => [
            'title' => 'Tiramisu Klasik Italia',
            'category' => 'Dessert',
            'time' => '45 mnt',
            'difficulty' => 'Sulit',
            'description' => 'Kue kopi berlapis krim mascarpone lembut khas Italia yang meleleh di mulut.',
            'image' => 'https://images.unsplash.com/photo-1586040140378-b5634cb4c8cb?q=80&w=1200&auto=format&fit=crop',
        ],
        'pasta-carbonara' => [
            'title' => 'Pasta Carbonara Autentik',
            'category' => 'Makan Siang',
            'time' => '25 mnt',
            'difficulty' => 'Menengah',
            'description' => 'Spaghetti creamy tanpa krim! Dibuat secara autentik dengan keju pecorino dan guanciale.',
            'image' => 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?q=80&w=1200&auto=format&fit=crop',
        ],
    ];

    $recipe = $allRecipes[$slug] ?? [
        'title' => 'Perfect Sourdough Bread',
        'category' => 'Artisan Baking',
        'time' => '75 mnt',
        'difficulty' => 'Advanced',
        'description' => 'A naturally leavened masterpiece with a blistered, crackling crust and an open, airy crumb.',
        'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=1200&auto=format&fit=crop',
    ];
    
    return view('recipe', compact('recipe'));
})->name('recipe.detail');

Route::get('/bookmarks', [\App\Http\Controllers\ChatController::class, 'bookmarks'])->middleware(['auth'])->name('bookmarks');

Route::get('/history', [\App\Http\Controllers\ChatController::class, 'history'])->middleware(['auth'])->name('history');

// Chat API Routes
Route::middleware('auth')->group(function () {
    Route::get('/api/pantry-items', [\App\Http\Controllers\ChatController::class, 'pantryItems']);
    Route::post('/chat/session', [\App\Http\Controllers\ChatController::class, 'createSession']);
    Route::post('/chat/message', [\App\Http\Controllers\ChatController::class, 'sendMessage']);
    Route::post('/chat/session/{id}/bookmark', [\App\Http\Controllers\ChatController::class, 'toggleBookmark']);
    Route::delete('/chat/session/{id}', [\App\Http\Controllers\ChatController::class, 'deleteSession']);
    Route::post('/explore/bookmark', [\App\Http\Controllers\ExploreController::class, 'toggleBookmark']);
});

Route::get('/settings', function () {
    return view('settings');
})->middleware(['auth'])->name('settings');

Route::get('/community', function () {
    return view('community');
})->name('community');

Route::get('/pantry', [\App\Http\Controllers\PantryController::class, 'index'])->middleware(['auth'])->name('pantry');
Route::post('/pantry', [\App\Http\Controllers\PantryController::class, 'store'])->middleware(['auth'])->name('pantry.store');
Route::put('/pantry/{pantry}', [\App\Http\Controllers\PantryController::class, 'update'])->middleware(['auth'])->name('pantry.update');
Route::delete('/pantry/{pantry}', [\App\Http\Controllers\PantryController::class, 'destroy'])->middleware(['auth'])->name('pantry.destroy');


Route::post('/generate-recipe', [RecipeController::class, 'generate'])->name('recipe.generate');
Route::post('/language', [\App\Http\Controllers\LanguageController::class, 'switch'])->name('language.switch');



require __DIR__.'/auth.php';
