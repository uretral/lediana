<?php

namespace App\View\Components;

use App\Models\Services\MenuType;
use Illuminate\View\Component;

class Header extends Component
{

    public object $menu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $menus = MenuType::with('pages')->get();
        $result = [];
        foreach ($menus as $menu){
            $result[$menu->type] = $menu;
        }
        $this->menu = (object)$result;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }


}
