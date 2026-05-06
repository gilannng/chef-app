<x-guest-layout>
    <div class="mb-10 text-center lg:text-left">
        <h2 class="text-3xl font-extrabold text-on-surface tracking-tight">Create an account</h2>
        <p class="mt-3 text-base text-gray-500">
            Join Culinary Atelier and master your kitchen today.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-on-surface mb-2">Full Name</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                    class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-high border-0 rounded-xl text-on-surface ring-1 ring-inset ring-outline/20 focus:ring-2 focus:ring-inset focus:ring-primary focus:bg-white placeholder:text-gray-400 transition-all duration-200 sm:text-sm sm:leading-6" 
                    placeholder="John Doe">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-on-surface mb-2">Email address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                    class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-high border-0 rounded-xl text-on-surface ring-1 ring-inset ring-outline/20 focus:ring-2 focus:ring-inset focus:ring-primary focus:bg-white placeholder:text-gray-400 transition-all duration-200 sm:text-sm sm:leading-6" 
                    placeholder="you@example.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-on-surface mb-2">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="new-password" 
                    class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-high border-0 rounded-xl text-on-surface ring-1 ring-inset ring-outline/20 focus:ring-2 focus:ring-inset focus:ring-primary focus:bg-white placeholder:text-gray-400 transition-all duration-200 sm:text-sm sm:leading-6" 
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-on-surface mb-2">Confirm Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                    class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-high border-0 rounded-xl text-on-surface ring-1 ring-inset ring-outline/20 focus:ring-2 focus:ring-inset focus:ring-primary focus:bg-white placeholder:text-gray-400 transition-all duration-200 sm:text-sm sm:leading-6" 
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-sm shadow-primary/20 text-sm font-bold text-white bg-primary hover:bg-brand-dark-green hover:shadow-lg hover:shadow-primary/30 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300">
                Create account
            </button>
        </div>
    </form>

    <div class="mt-10 text-center">
        <p class="text-sm text-gray-500">
            Already registered? 
            <a href="{{ route('login') }}" class="font-semibold text-primary hover:text-brand-dark-green transition-colors">Sign in instead</a>
        </p>
    </div>
</x-guest-layout>
