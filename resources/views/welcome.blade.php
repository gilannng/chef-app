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
        <nav id="main-nav" class="fixed top-0 z-50 w-full px-6 py-6 md:px-12 lg:px-24 flex items-center justify-between transition-all duration-300">
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
        <div class="relative z-10 flex-1 flex flex-col px-6 md:px-12 lg:px-24 max-w-4xl pt-32">
            
            <!-- Main Copy Centered -->
            <div class="flex-1 flex flex-col justify-center">
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6 tracking-tight animate-[fadeUp_0.8s_ease-out_forwards]">
                    Master your <br>culinary skills
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-14 max-w-2xl font-light leading-relaxed animate-[fadeUp_1s_ease-out_forwards]">
                    Experience a state-of-the-art chef simulator and intelligent pantry management system designed for culinary excellence. Cook smarter, not harder.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 mb-16 mt-4 animate-[fadeUp_1.2s_ease-out_forwards]">
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
            <div class="flex flex-wrap gap-4 mt-8 pb-12 shrink-0 animate-[fadeUp_1.4s_ease-out_forwards]">
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

    <!-- Features Section -->
    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
            <div class="text-center mb-16">
                <h2 class="text-sm font-bold text-[#2D9B4E] uppercase tracking-widest mb-3">Core Capabilities</h2>
                <h3 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">Revolutionize your cooking</h3>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Our AI-driven platform provides tools that were previously only available to professional executive chefs.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="flex gap-6 p-6 rounded-2xl hover:bg-gray-50 transition-colors group">
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-[#2D9B4E] transition-colors">
                            <svg class="w-8 h-8 text-[#2D9B4E] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2">AI Recipe Generation</h4>
                            <p class="text-gray-600">Instantly create unique recipes based on your dietary preferences and available ingredients.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 p-6 rounded-2xl hover:bg-gray-50 transition-colors group">
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-blue-600 transition-colors">
                            <svg class="w-8 h-8 text-blue-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2">Cooking Simulations</h4>
                            <p class="text-gray-600">Practice techniques in a risk-free virtual environment before stepping into the kitchen.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 p-6 rounded-2xl hover:bg-gray-50 transition-colors group">
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center shrink-0 group-hover:bg-purple-600 transition-colors">
                            <svg class="w-8 h-8 text-purple-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2">Skill Tracking</h4>
                            <p class="text-gray-600">Monitor your progress as you master different cuisines and technical skills.</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="/images/landing/features.png" alt="AI Chef Interface" class="rounded-3xl shadow-2xl border border-gray-100">
                    <div class="absolute -bottom-6 -left-6 bg-[#2D9B4E] text-white p-6 rounded-2xl shadow-xl hidden lg:block">
                        <p class="text-3xl font-black">98%</p>
                        <p class="text-sm opacity-80 uppercase font-bold tracking-tighter">Accuracy in Flavor Pairing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Smart Pantry Section -->
    <section id="pantry" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="w-full lg:w-1/2 order-2 lg:order-1">
                    <img src="/images/landing/pantry.png" alt="Smart Pantry System" class="rounded-3xl shadow-2xl border border-white">
                </div>
                <div class="w-full lg:w-1/2 order-1 lg:order-2">
                    <h2 class="text-sm font-bold text-[#2D9B4E] uppercase tracking-widest mb-3">Inventory Reimagined</h2>
                    <h3 class="text-4xl font-black text-gray-900 mb-6">Your kitchen, digitized.</h3>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Never run out of essential ingredients again. Our Smart Pantry tracks everything from salt levels to the freshness of your produce.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                            </div>
                            <span class="font-medium text-gray-800">Auto-generated shopping lists</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                            </div>
                            <span class="font-medium text-gray-800">Expiration date alerts</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"></path></svg>
                            </div>
                            <span class="font-medium text-gray-800">Nutrition & health scoring</span>
                        </li>
                    </ul>
                    <div class="mt-10">
                        <a href="{{ route('register') }}" class="text-[#2D9B4E] font-bold flex items-center gap-2 hover:gap-4 transition-all">
                            Learn more about Pantry <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Section -->
    <section id="community" class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
            <div class="text-center mb-16">
                <h2 class="text-sm font-bold text-[#2D9B4E] uppercase tracking-widest mb-3">Global Network</h2>
                <h3 class="text-4xl font-black text-gray-900 mb-6">Join the Culinary Movement</h3>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Connect with thousands of chefs, share your creations, and compete in monthly culinary challenges.</p>
            </div>

            <div class="relative">
                <!-- Feed Preview -->
                <div class="rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                    <img src="/images/landing/community.png" alt="Community Feed" class="w-full">
                </div>
                
                <!-- Floating Stats -->
                <div class="absolute top-1/2 -right-20 transform -translate-y-1/2 hidden xl:block">
                    <div class="bg-white p-8 rounded-3xl shadow-2xl border border-gray-100 space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                <span class="text-orange-600 font-bold">12k</span>
                            </div>
                            <div>
                                <p class="font-bold">Active Chefs</p>
                                <p class="text-xs text-gray-500">Online now</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center">
                                <span class="text-pink-600 font-bold">50k</span>
                            </div>
                            <div>
                                <p class="font-bold">Recipes Shared</p>
                                <p class="text-xs text-gray-500">This month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-[#2D9B4E] rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                        </div>
                        <span class="text-2xl font-bold tracking-tight">Culinary Atelier</span>
                    </div>
                    <p class="text-gray-400 max-w-sm mb-8">
                        Elevating the art of home cooking through intelligent technology and community inspiration.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-[#2D9B4E] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-[#2D9B4E] transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Product</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#features" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="#pantry" class="hover:text-white transition-colors">Smart Pantry</a></li>
                        <li><a href="#community" class="hover:text-white transition-colors">Community</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Mobile App</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Support</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500 text-sm">
                <p>© 2024 Culinary Atelier. All rights reserved.</p>
                <div class="flex gap-8">
                    <span>English (US)</span>
                    <span>USD ($)</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Navbar scroll effect
        const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                nav.classList.add('bg-black/80', 'backdrop-blur-lg', 'py-4');
                nav.classList.remove('py-6');
            } else {
                nav.classList.remove('bg-black/80', 'backdrop-blur-lg', 'py-4');
                nav.classList.add('py-6');
            }
        });
    </script>
</body>
</html>