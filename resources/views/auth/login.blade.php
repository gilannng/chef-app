<x-guest-layout>
    <div class="mb-10 text-center lg:text-left">
        <h2 class="text-3xl font-extrabold text-on-surface tracking-tight">Welcome back</h2>
        <p class="mt-3 text-base text-gray-500">
            Please enter your details to sign in.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6 p-4 rounded-xl bg-green-50 text-brand-green" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-on-surface mb-2">Email address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                    class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-high border-0 rounded-xl text-on-surface ring-1 ring-inset ring-outline/20 focus:ring-2 focus:ring-inset focus:ring-primary focus:bg-white placeholder:text-gray-400 transition-all duration-200 sm:text-sm sm:leading-6" 
                    placeholder="Enter your email">
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
                <input id="password" type="password" name="password" required autocomplete="current-password" 
                    class="block w-full pl-11 pr-4 py-3.5 bg-surface-container-high border-0 rounded-xl text-on-surface ring-1 ring-inset ring-outline/20 focus:ring-2 focus:ring-inset focus:ring-primary focus:bg-white placeholder:text-gray-400 transition-all duration-200 sm:text-sm sm:leading-6" 
                    placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between pt-2">
            <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox" class="h-5 w-5 rounded border-outline/30 text-primary focus:ring-primary transition duration-200 cursor-pointer">
                <label for="remember_me" class="ml-3 block text-sm text-gray-600 cursor-pointer hover:text-on-surface transition-colors">Remember for 30 days</label>
            </div>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-primary hover:text-brand-dark-green transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-sm shadow-primary/20 text-sm font-bold text-white bg-primary hover:bg-brand-dark-green hover:shadow-lg hover:shadow-primary/30 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-300">
                Sign in to your account
            </button>
        </div>
    </form>
    
    @if (Route::has('register'))
    <div class="mt-10 text-center">
        <p class="text-sm text-gray-500">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-semibold text-primary hover:text-brand-dark-green transition-colors">Sign up for free</a>
        </p>
    </div>
    @endif
</x-guest-layout>
