<?php

namespace App\Providers;

use App\Models\UserSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $user = Auth::user();
            if($user) {
                $user_settings = UserSettings::where('user_id', Auth::user()->id)->first();
                // $notification_count = Notification::where(['user_id' => $user->id, 'delivered' => 0])->count();
                
                $view->with(compact('user_settings'));
            }
        });
    }
}
