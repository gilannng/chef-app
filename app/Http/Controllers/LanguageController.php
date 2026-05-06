<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    /**
     * Switch the application language.
     */
    public function switch(Request $request)
    {
        $validated = $request->validate([
            'locale' => 'required|string|in:id,en',
        ]);

        $locale = $validated['locale'];

        if (Auth::check()) {
            $user = Auth::user();
            $user->locale = $locale;
            $user->save();
        }

        session(['locale' => $locale]);
        App::setLocale($locale);

        return back()->with('success', $locale === 'id' ? 'Bahasa berhasil diubah!' : 'Language updated successfully!');
    }
}
