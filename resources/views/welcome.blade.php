<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Culinary Atelier') }} - Master Your Kitchen</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .nav-link {
            position: relative;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: white;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #2D9B4E; /* brand-green */
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Hero Section -->
    <div class="relative min-h-screen flex flex-col overflow-hidden bg-gray-900">
        <!-- Video Background -->
        <video autoplay loop muted playsinline poster="https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?q=80&w=1920&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover z-0 opacity-60">
            <source src="https://player.vimeo.com/external/411475149.hd.mp4?s=7b30a597a7da9d7ef8426cf3dc48d5162a048704&profile_id=174" type="video/mp4">
            <source src="https://assets.mixkit.co/videos/preview/mixkit-chef-cutting-vegetables-in-a-kitchen-42721-large.mp4" type="video/mp4">
        </video>
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/50 to-transparent z-0"></div>

        <!-- Navigation -->
        <nav class="relative z-10 w-full px-6 py-6 md:px-12 lg:px-24 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                </div>
                <span class="text-xl font-bold text-white tracking-tight">Culinary Atelier</span>
            </div>

            <!-- Main Menu (Hidden on mobile) -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#" class="nav-link">Home</a>
                <a href="#features" class="nav-link">Features</a>
                <a href="#pantry" class="nav-link">Smart Pantry</a>
                <a href="#community" class="nav-link">Community</a>
            </div>

            <!-- Search & Auth -->
            <div class="hidden md:flex items-center gap-4">
                <div class="relative">
                    <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Search..." class="bg-white/10 border border-white/20 text-white rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#2D9B4E] backdrop-blur-sm placeholder-gray-300 w-48 transition-all focus:w-64">
                </div>
                
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-white font-medium hover:text-gray-200 ml-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-white font-medium hover:text-gray-200 ml-2">Log in</a>
                    <a href="{{ route('register') }}" class="bg-white text-gray-900 font-bold px-5 py-2.5 rounded-full hover:bg-gray-100 transition-colors shadow-lg">Sign up</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </nav>

        <!-- Hero Content -->
        <div class="relative z-10 flex-1 flex flex-col px-6 md:px-12 lg:px-24 max-w-4xl animate-[fadeUp_0.8s_ease-out_forwards]">
            
            <!-- Main Copy Centered -->
            <div class="flex-1 flex flex-col justify-center">
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                    Master your <br>culinary skills
                </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-14 max-w-2xl font-light leading-relaxed">
                Experience a state-of-the-art chef simulator and intelligent pantry management system designed for culinary excellence. Cook smarter, not harder.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 mb-16 mt-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-[#2D9B4E] hover:bg-[#1e7a3a] text-white font-bold px-8 py-4 rounded-full text-center transition-all shadow-lg hover:shadow-[#2D9B4E]/50 hover:-translate-y-1">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-[#2D9B4E] hover:bg-[#1e7a3a] text-white font-bold px-8 py-4 rounded-full text-center transition-all shadow-lg hover:shadow-[#2D9B4E]/50 hover:-translate-y-1">
                        Sign up for free
                    </a>
                @endauth
            </div>
            </div>

            <!-- App Store Badges -->
            <div class="flex flex-wrap gap-4 mt-8 pb-12 shrink-0">
                <a href="#" class="flex items-center gap-3 bg-black/60 hover:bg-black/80 border border-white/20 backdrop-blur-sm text-white px-5 py-2.5 rounded-xl transition-colors">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.04 2.26-.8 3.59-.8 1.54.02 2.82.68 3.65 1.83-3.18 1.93-2.67 5.75.46 6.95-.73 1.83-1.63 3.39-2.78 4.19zm-3.66-14.2c.57-1.42-.03-3.1-1.4-3.92-.85.83-1.63 2.5-1.04 3.84.9.04 1.87-.76 2.44-.08z"/></svg>
                    <div class="text-left">
                        <div class="text-[10px] uppercase font-semibold text-gray-300">Download on the</div>
                        <div class="text-sm font-bold -mt-1">App Store</div>
                    </div>
                </a>
                <a href="#" class="flex items-center gap-3 bg-black/60 hover:bg-black/80 border border-white/20 backdrop-blur-sm text-white px-5 py-2.5 rounded-xl transition-colors">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M3 20.5V3.5C3 2.91 3.34 2.39 3.86 2.15L15 12L3.86 21.85C3.34 21.61 3 21.09 3 20.5ZM16.31 10.9L20.16 13.06C21.28 13.69 21.28 15.31 20.16 15.94L16.31 18.1L15 12L16.31 10.9Z" fill="#EA4335"/><path d="M16.31 10.9L15 12L3.86 2.15C4.24 1.98 4.7 2 5.03 2.18L16.31 10.9Z" fill="#FBBC04"/><path d="M16.31 18.1L5.03 24.82C4.7 25 4.24 25.02 3.86 24.85L15 12L16.31 18.1Z" fill="#34A853"/><path d="M15 12L16.31 10.9L20.16 13.06C20.6 13.3 20.88 13.75 20.88 14.25C20.88 14.75 20.6 15.2 20.16 15.44L16.31 18.1L15 12Z" fill="#4285F4"/></svg>
                    <div class="text-left">
                        <div class="text-[10px] uppercase font-semibold text-gray-300">Get it on</div>
                        <div class="text-sm font-bold -mt-1">Google Play</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>