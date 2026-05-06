@props(['active' => 'dashboard'])

@php
$navItems = [
    'dashboard' => ['url' => '/dashboard', 'icon' => 'grid_view', 'label' => __('messages.sidebar_home')],
    'explore'   => ['url' => '/explore', 'icon' => 'restaurant_menu', 'label' => __('messages.sidebar_recipes')],
    'pantry'    => ['url' => '/pantry', 'icon' => 'inventory_2', 'label' => __('messages.sidebar_pantry')],
    'community' => ['url' => '/community', 'icon' => 'groups', 'label' => __('messages.sidebar_community')],
    'bookmarks' => ['url' => '/bookmarks', 'icon' => 'bookmark', 'label' => __('messages.sidebar_bookmarks')],
    'history'   => ['url' => '/history', 'icon' => 'history', 'label' => __('messages.sidebar_history')],
];

$bottomItems = [
    'settings'  => ['url' => '/settings', 'icon' => 'settings', 'label' => __('messages.sidebar_settings')],
];
@endphp

<div id="sidebar-overlay"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm z-30 hidden opacity-0 transition-all duration-300 ease-in-out"
    onclick="toggleSidebar()"></div>

<aside id="sidebar"
    class="group/sidebar h-screen fixed left-0 top-0 border-r border-surface-variant bg-surface/95 backdrop-blur-xl flex flex-col z-[60] transition-all duration-300 ease-in-out shadow-2xl md:shadow-none hover:md:shadow-2xl
    w-64 -translate-x-full md:translate-x-0 md:w-20 hover:md:w-64 overflow-x-hidden overflow-y-auto py-6 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

    <button onclick="toggleSidebar()"
        class="md:hidden absolute top-4 right-4 text-on-surface-variant hover:bg-surface-variant p-2 rounded-full transition-colors">
        <span class="material-symbols-outlined">close</span>
    </button>

    <div class="flex flex-col items-center pt-2 px-6 md:px-0 group-hover/sidebar:px-6 transition-all duration-300">
        <div class="relative cursor-pointer shrink-0 flex justify-center w-full">
            <a href="/settings" class="block">
                <img alt="Chef logo"
                    class="w-16 h-16 md:w-10 md:h-10 group-hover/sidebar:w-16 group-hover/sidebar:h-16 rounded-full object-cover organic-shadow relative z-10 border-2 border-white transition-all duration-300"
                    src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ urlencode(auth()->user()->name ?? 'Chef') }}&backgroundColor=fbf9f0" />
            </a>
        </div>
        <div class="text-center mt-3 opacity-100 md:opacity-0 group-hover/sidebar:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            <h2 class="text-lg font-black text-primary font-headline tracking-tight">The Atelier</h2>
            <p class="text-[10px] font-bold text-secondary tracking-widest uppercase">Chef Simulator</p>
        </div>
    </div>

    <div class="px-6 md:px-3 group-hover/sidebar:px-6 transition-all duration-300 w-full mt-6 shrink-0">
        <a href="/chat"
            class="w-full bg-gradient-to-r from-primary to-primary-container text-white rounded-xl py-3 md:py-3 px-4 md:px-0 group-hover/sidebar:px-4 font-bold text-sm organic-shadow hover:shadow-lg hover:shadow-primary/30 active:scale-95 transition-all duration-200 flex justify-center items-center overflow-hidden">
            <span class="material-symbols-outlined text-[20px] shrink-0">add_circle</span> 
            <span class="whitespace-nowrap font-bold opacity-100 md:opacity-0 group-hover/sidebar:opacity-100 transition-opacity duration-300 w-auto md:w-0 group-hover/sidebar:w-auto overflow-hidden pl-2">{{ __('messages.sidebar_create') }}</span>
        </a>
    </div>

    <nav class="flex-1 space-y-2 font-medium px-4 md:px-3 group-hover/sidebar:px-4 transition-all duration-300 mt-6 shrink-0">
        @foreach($navItems as $key => $item)
            <a href="{{ $item['url'] }}" class="flex items-center rounded-xl overflow-hidden transition-colors {{ $active === $key ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-secondary hover:bg-surface-container-high hover:text-on-surface' }}">
                <div class="w-14 h-12 shrink-0 flex items-center justify-center">
                    <span class="material-symbols-outlined" style="{{ $active === $key ? 'font-variation-settings: \'FILL\' 1;' : '' }}">{{ $item['icon'] }}</span>
                </div>
                <span class="whitespace-nowrap pr-4 font-medium opacity-100 md:opacity-0 group-hover/sidebar:opacity-100 transition-opacity duration-300">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="mt-4 space-y-2 font-medium border-t border-surface-variant pt-4 px-4 md:px-3 group-hover/sidebar:px-4 transition-all duration-300 shrink-0">
        @foreach($bottomItems as $key => $item)
            <a href="{{ $item['url'] }}" class="flex items-center rounded-xl overflow-hidden transition-colors {{ $active === $key ? 'bg-primary text-white shadow-md shadow-primary/20' : 'text-secondary hover:bg-surface-container-high hover:text-on-surface' }}">
                <div class="w-14 h-12 shrink-0 flex items-center justify-center">
                    <span class="material-symbols-outlined" style="{{ $active === $key ? 'font-variation-settings: \'FILL\' 1;' : '' }}">{{ $item['icon'] }}</span>
                </div>
                <span class="whitespace-nowrap pr-4 font-medium opacity-100 md:opacity-0 group-hover/sidebar:opacity-100 transition-opacity duration-300">{{ $item['label'] }}</span>
            </a>
        @endforeach
        
        <a href="#" onclick="openSupportModal(event)" class="flex items-center text-secondary hover:bg-surface-container-high hover:text-on-surface rounded-xl overflow-hidden transition-colors">
            <div class="w-14 h-12 shrink-0 flex items-center justify-center">
                <span class="material-symbols-outlined">help_outline</span>
            </div>
            <span class="whitespace-nowrap pr-4 font-medium opacity-100 md:opacity-0 group-hover/sidebar:opacity-100 transition-opacity duration-300">{{ __('messages.sidebar_support') }}</span>
        </a>
        <a href="#" onclick="openLogoutModal(event)" class="flex items-center text-error hover:bg-error-container hover:text-error rounded-xl overflow-hidden transition-colors mt-2">
            <div class="w-14 h-12 shrink-0 flex items-center justify-center">
                <span class="material-symbols-outlined">logout</span>
            </div>
            <span class="whitespace-nowrap pr-4 font-bold opacity-100 md:opacity-0 group-hover/sidebar:opacity-100 transition-opacity duration-300">{{ __('messages.sidebar_logout') }}</span>
        </a>
    </div>
</aside>

<script>
    // Professional global image fallback mechanism
    document.addEventListener('error', function(e) {
        if (e.target.tagName && e.target.tagName.toLowerCase() === 'img') {
            if (e.target.dataset.fallbackApplied) return;
            e.target.dataset.fallbackApplied = 'true';
            
            e.target.src = "data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='600' viewBox='0 0 800 600'%3E%3Cdefs%3E%3ClinearGradient id='bg' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%23f5f4eb'/%3E%3Cstop offset='100%25' stop-color='%23e2e3dd'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='800' height='600' fill='url(%23bg)'/%3E%3Cg transform='translate(400, 260)' text-anchor='middle'%3E%3Cg stroke='%23a09e95' stroke-width='2.5' fill='none' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='-32' y='-32' width='64' height='64' rx='12'/%3E%3Ccircle cx='-10' cy='-10' r='6'/%3E%3Cpath d='M-32 16 L-16 0 L8 24 M12 12 L32 32'/%3E%3C/g%3E%3Ctext y='70' font-family='Plus Jakarta Sans, ui-sans-serif, system-ui, sans-serif' font-size='14' font-weight='800' fill='%235e5c54' letter-spacing='0.08em'%3EIMAGE NOT AVAILABLE%3C/text%3E%3Ctext y='92' font-family='Plus Jakarta Sans, ui-sans-serif, system-ui, sans-serif' font-size='12' font-weight='500' fill='%23858277'%3EVisual tidak dapat dimuat%3C/text%3E%3C/g%3E%3C/svg%3E";
            
            e.target.classList.remove('p-4', 'bg-surface-container-low', 'object-contain');
            e.target.classList.add('object-cover');
        }
    }, true);
</script>
