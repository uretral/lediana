<?php

namespace App\Traits\Editor;

use App\Models\Item\ItemSpreadColor;
use App\Models\Printout\PrintoutSpread;
use App\Services\PrintoutService;

trait LayoutManager
{

    public function spreadBg()
    {
        return ItemSpreadColor::all();
    }

    public function onSetBackground($bg_id)
    {
        if (!$this->activeSpread) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'warning', 'message' => \Lang::get('front.chose_page')]);
            return false;
        }
        $this->activeSpread->page_color = $bg_id;
        $this->activeSpread->push();
    }

    public function onSetTemplate($tpl_id)
    {
        $this->printout->current_template_id = $tpl_id;
        $this->printout->push();
    }


    public function layoutTemplates()
    {
        return $this->printout->layout_templates->where('id', '!=', 1);
    }

}
