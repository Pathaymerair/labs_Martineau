<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\State;
use App\Comment;
use App\Post;
use App\Tag;
use App\Categorie;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $comments = Comment::where('state_id', 1)->count();
            $posts = Post::where('state_id', 1)->count();
            $tags = Tag::where('state_id', 1)->count();
            $categories = Categorie::where('state_id', 1)->count();
            $all = $comments + $posts + $tags + $categories;
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text'        => 'Pending',
                'url'         => '/pending',
                'icon'        => 'users',
                'label'       => $all,
                'label_color' => 'success',
            ]);
        });
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
