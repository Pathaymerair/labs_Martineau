<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;
use App\Post;
use App\Tag;
use App\Categorie;
use App\Comment;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('superadmin', function ($user) {
             

            return $user->role_id == 1;
        });
        Gate::define('admin', function ($user) {
           
            return $user->role_id < 3;
        });
        Gate::define('post', function($user, $poste){
            $post = Post::where('id', $poste)->first();
      
            return $user->role_id == 1 || $user->id === $post->user_id;
        });
        Gate::define('profil', function($user, $profil){
            
            return $user->role_id == 1 || $user->id == $profil;
        });
        Gate::define('categories', function($user, $categories){
            $categorie = Categorie::where('id', $categories)->first();
            return $user->role_id == 1 || $user->id == $categorie->user->id;
        });
        Gate::define('comments', function($user, $comments){
            $comment = Comment::where('id', $comments)->first();
            return $user->role_id == 1 || $user->id == $comment->user_id;
        });
        Gate::define('tags', function($user, $tags){
            $tag = Tag::where('id', $tags)->first();
            return $user->role_id == 1 || $user->id == $tag->user_id;
        });
        Gate::define('users', function($user, $users){
            $utilisateur = User::where('id', $users)->first();
            return $user->role_id == 1 || $user->id == $utilisateur->id;
        });


    }
}
