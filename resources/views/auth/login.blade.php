<x-admin-layout>
    <div class="min-h-screen flex items-center justify-center bg-luxury-dark">
        <div class="w-full max-w-md p-8 space-y-8 bg-luxury-accent rounded-lg shadow-lg border border-luxury-gold/20">
            <div class="text-center">       
                <h2 class="text-3xl font-extrabold text-luxury-gold">
                    Admin Portal
                </h2>
                <p class="mt-2 text-sm text-luxury-light/80">
                    Enter your credentials to access the dashboard
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="rounded-md shadow-sm space-y-4">
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-luxury-gold mb-1">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="appearance-none relative block w-full px-3 py-3 border border-luxury-gold/30 bg-luxury-dark text-luxury-light placeholder-gray-400 rounded-md focus:outline-none focus:ring-luxury-gold focus:border-luxury-gold focus:z-10 sm:text-sm"
                               placeholder="admin@example.com" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-luxury-gold mb-1">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="appearance-none relative block w-full px-3 py-3 border border-luxury-gold/30 bg-luxury-dark text-luxury-light placeholder-gray-400 rounded-md focus:outline-none focus:ring-luxury-gold focus:border-luxury-gold focus:z-10 sm:text-sm"
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                               class="h-4 w-4 text-luxury-gold focus:ring-luxury-gold border-luxury-gold/30 rounded bg-luxury-dark">
                        <label for="remember_me" class="ml-2 block text-sm text-luxury-light">
                            Remember me
                        </label>
                    </div>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-luxury-gold hover:text-amber-500">
                                Forgot password?
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-luxury-dark bg-luxury-gold hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-luxury-gold transition-colors duration-200">
                        Sign in
                    </button>
                </div>
            </form>

            <div class="text-center text-sm text-luxury-light/60 mt-6">
                <p>© {{ date('Y') }} Luxury Admin. All rights reserved.</p>
            </div>
        </div>
    </div>
</x-admin-layout>