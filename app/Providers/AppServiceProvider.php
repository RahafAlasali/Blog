<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
        // Gate::define('delete-comment', function (User $user, Comment $comment) {
        //     return $user->id === $comment->user_id;
        // });
        Gate::define('create-post', function (User $user) {
            return auth()->check();
        });
    }
}