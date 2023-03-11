<?php

namespace App\Traits\Editor;

use App\Models\Layout\Layout;
use App\Models\Printout\PrintoutSpread;

trait LayoutSpreadThumbs
{
    public ?PrintoutSpread $active_spread = null;
    public $currentLayouts;

    public function defineLayouts()
    {
        return $this->printout->layouts->where(
            'template.id',
            $this->printout->current_template_id ?? self::DEFAULT_TEMPLATE_ID
        );
    }

    public function onSetSpreadLayout($layout_id,$template_id)
    {
/*        if (!$this->activeSpread) {
            $this->dispatchBrowserEvent('alert', ['type' => 'warning', 'message' => \Lang::get('front.chose_page')]);
            return false;
        }
        $this->unsetPhotos();
        $this->unsetTexts();
        if ($template_id === 4) {
            $this->unsetEvenSpreadAttributes($layout_id,$template_id);
            $this->onSetActiveSpread($this->oddSpread->id);
        } else {
            $this->activeSpread->layout_id = $layout_id;
            $this->activeSpread->template_id = $template_id;
            $this->activeSpread->push();
        }*/

        $this->printout->spread()->update([
            'layout_id' => $layout_id,
            'template_id' => $template_id
        ]);
    }

    public function unsetEvenSpreadAttributes($layout_id,$template_id)
    {
        $this->oddSpread->layout_id = $layout_id;
        $this->oddSpread->template_id = $template_id;
        $this->oddSpread->push();

        $this->evenSpread->layout_id = null;
        $this->evenSpread->template_id = null;
        $this->evenSpread->push();
    }
}
