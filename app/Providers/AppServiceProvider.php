<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $page_data = Page::where('id',1)->first();
        $room_data = Room::get();
        $book_data = Book::get();
        $excursion_data = Book::get();
        $setting_data = Setting::where('id',1)->first();

        view()->share('global_page_data', $page_data);
        view()->share('global_room_data', $room_data);
        view()->share('global_book_data', $book_data);
        view()->share('global_excursion_data', $excursion_data);
        view()->share('global_setting_data', $setting_data);
    }
}
