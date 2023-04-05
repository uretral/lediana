<?php

namespace App\Traits;

use App\Models\Services\MenuType;
use App\Models\Settings\Communication;
use App\Models\Settings\Social;

trait Settings
{
    public function init(){
        $menus = MenuType::with('pages')->get();

        $result = [];
        foreach ($menus as $menu){
            $result[$menu->type] = $menu;
        }
        \View::share([
            'menu' => (object)$result,
            'communications' => Communication::all()->keyBy('slug'),
            'socials' => Social::whereActive(1)->orderBy('sort')->get(),
        ]);
    }

}
