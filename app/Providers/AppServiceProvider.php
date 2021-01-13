<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Moderator;
use App\Models\Option;
use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        if(\Schema::hasTable('options')){
            $option = Option::find(1);
            if(!isset($option)){
                $option = new Option();
                $option->id = 1;
                $option->title = 'سهيلة';
                $option->face = 'facebook.com';
                $option->insta = 'instagram.com';
                $option->twitter = 'twitter.com';
                $option->youtube = 'youtube.com';
                $option->phone = '99999900000000';
                $option->whats = '99999900000000';
                $option->email = 'najla@gmail.com';
                $option->active = 1;
                $option->save();
            }
            $admin = Moderator::find(1);
            if(!isset($admin)){
                $admin = new Moderator();
                $admin->id = 1;
                $admin->name = 'Admin';
                $admin->email = 'admin@gmail.com';
                $admin->password = Hash::make('123456789');
                $admin->status = 1;
                $admin->save();
            }
            $page = Page::find(1);
            if(!isset($page)){
                $page = new Page();
                $page->id = 1;
                $page->name = 'عن سهيلة';
                $page->body = 'عن سهيلة';
                $page->slug = 'about-home';
                $page->active = 1;
                $page->save();
            }
            $country = Country::find(1);
            if(!isset($country)){
                $country = new Country();
                $country->id = 1;
                $country->name = 'المملكة العربية السعودية';
                $country->code = 'KSA';
                $country->active = 1;
                $country->save();
            }
        }
    }
}
