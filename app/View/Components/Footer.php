<?php

namespace App\View\Components;

use App\Models\Services\MenuType;
use App\Models\Settings\Communication;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Footer extends Component
{
    public object $menu;
    public Collection $communications;
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
        $this->communications = Communication::all()->keyBy('slug');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
