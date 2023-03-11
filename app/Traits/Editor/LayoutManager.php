<?php

namespace App\Traits\Editor;

use App\Models\Item\ItemSpreadColor;
use App\Models\Printout\PrintoutSpread;
use App\Services\PrintoutService;

trait LayoutManager
{

    public function getTemplateProperty($tpl_id = null)
    {
        return $tpl_id ?? $this->printout->spread->template_id ?? 3;
    }

    public function setTemplateProperty($tpl_id)
    {
        $this->template = $tpl_id;
    }

    public function spreadBg()
    {
        return ItemSpreadColor::all();
    }

    public function onSetBackground($bg_id)
    {
        $this->printout->spread()->update([
            'page_color' => $bg_id
        ]);
    }

    public function layoutTemplates()
    {
        return $this->printout->layout_templates->where('id', '!=', 1);
    }

}
