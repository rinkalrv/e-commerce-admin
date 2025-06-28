<nav class="bg-luxury-dark text-luxury-light w-64 min-h-screen p-4 ">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-xl font-bold text-luxury-gold">Hermès Admin</h1>
    </div>

    <ul class="space-y-2">
        <li>
            <a href="{{ route('admin.dashboard') }}" 
               class="block px-4 py-2 rounded hover:bg-luxury-accent transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-luxury-accent' : '' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.index') }}" 
               class="block px-4 py-2 rounded hover:bg-luxury-accent transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-luxury-accent' : '' }}">
                Products
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}" 
               class="block px-4 py-2 rounded hover:bg-luxury-accent transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-luxury-accent' : '' }}">
                Categories
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.index') }}" 
               class="block px-4 py-2 rounded hover:bg-luxury-accent transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-luxury-accent' : '' }}">
                Orders
            </a>
        </li>
        <li>
            <a href="{{ route('admin.cms.index') }}" 
               class="block px-4 py-2 rounded hover:bg-luxury-accent transition-colors {{ request()->routeIs('admin.cms.*') ? 'bg-luxury-accent' : '' }}">
                CMS Pages
            </a>
        </li>
        <li>
            <a href="{{ route('admin.banners.index') }}" 
               class="block px-4 py-2 rounded hover:bg-luxury-accent transition-colors {{ request()->routeIs('admin.banners.*') ? 'bg-luxury-accent' : '' }}">
                Banners
            </a>
        </li>
    </ul>

    <div class="mt-8 pt-4 border-t border-luxury-accent">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 rounded hover:bg-luxury-accent transition-colors">
                Log Out
            </button>
        </form>
    </div>
</nav>