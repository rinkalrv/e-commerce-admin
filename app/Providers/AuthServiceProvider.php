<?php

namespace App\Providers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        Category::class => CategoryPolicy::class,
        Order::class => OrderPolicy::class,
        CmsPage::class => CmsPolicy::class,
        Banner::class => BannerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Optional: Create roles and permissions during setup
        if (app()->environment('local')) {
            $adminRole = Role::firstOrCreate(['name' => 'admin']);
            $editorRole = Role::firstOrCreate(['name' => 'editor']);
            
            Permission::firstOrCreate(['name' => 'view dashboard']);
            // Add other permissions as needed
        }
    }
}
