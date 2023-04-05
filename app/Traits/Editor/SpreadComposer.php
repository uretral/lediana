<?php

namespace App\Traits\Editor;

use App\Models\Printout\PrintoutSpread;
use Encore\Admin\Grid\Model;
use Illuminate\Database\Eloquent\Collection;

trait SpreadComposer
{

    public ?PrintoutSpread $activeSpread = null;

    public function getCoverProperty()
    {
        return $this->printout->spreads->first();
    }

    public function cover()
    {
        return $this->printout->spreads->first();
    }

    public function getOddSpreadProperty()
    {
//        dd('sdasd',$this->buttonSpreads);
        return array_key_exists(0, $this->buttonSpreads)
        ? $this->printout->spreads()->find($this->buttonSpreads[0]) : null;
    }

    public function getEvenSpreadProperty(): ?PrintoutSpread
    {
        return array_key_exists(1, $this->buttonSpreads)
            ? $this->printout->spreads->find($this->buttonSpreads[1]) : null;
    }

    /* Установка активного разворота/страницы */
    public function setSpread($id, $cnt) {
        $this->printout->update([
            'current_spread_id' => $id,
            'current_spread_nr' => $cnt
        ]);
    }

    public function leftSliderArrowState(): string
    {
        return $this->printout->current_spread_nr ? '' : 'disabled';
    }


    public function rightDoubleSliderArrowState(): string
    {
        return $this->printout->spreads_cnt <= $this->printout->current_spread_nr + 2 ? 'disabled' : '';
    }

    public function leftSliderArrowClick()
    {
        if ($this->printout->current_spread_nr > 0) {
            $this->printout->update(['current_spread_nr' => $this->printout->current_spread_nr - 1]);
        }
    }


    public function rightSliderArrowClick()
    {
        if ($this->printout->spreads()->count() > $this->printout->current_spread_nr + 1) {
            $this->printout->update(['current_spread_nr' => $this->printout->current_spread_nr + 1]);
        }
    }


    // Высота страницы разворота исходя из формата
    public function layoutDoubleSpreadStyle(): string
    {
        $size = $this->printout->size;
        $value = (369 / $size->width * $size->height);
        return 'style="--h: ' . $value . ';"';
    }

/*    public function activeOddSpreadEvent()
    {
        $this->onSetActiveSpread($this->oddSpread->spread_nr);
    }*/

/*    public function activeEvenSpreadEvent()
    {
        $this->onSetActiveSpread($this->evenSpread->spread_nr);
    }*/

/*    // Установка страницы разворота для манипуляций
    public function onSetActiveSpread($spread_nr)
    {
        $this->activeSpread = $this->printout->spreads->where('spread_nr', $spread_nr)->first();
        $this->setActiveAttributes();
    }*/

/*    // Активация атрибутов в соответствии с текущей моделью страницы разворота
    public function setActiveAttributes()
    {
        $layout = $this->activeSpread ? $this->getActiveLayout($this->activeSpread->layout_id) : null;
        $this->printout->current_template_id = $layout ? $layout->template->id : self::DEFAULT_TEMPLATE_ID;
        $this->printout->push();
    }*/

/*    public function getActiveLayout($layout_id)
    {
        if ($layout_id) {
            $layout = $this->printout->layouts->where('id', $layout_id)->first();
        }
        return $layout ?? null;
    }*/

/*    public function unsetActiveSpread()
    {
        $this->activeSpread = null;
        $this->printout->current_template_id = self::DEFAULT_TEMPLATE_ID;
        $this->printout->push();
//        $this->emit('unsetActiveSpread');
        $this->dispatchBrowserEvent('unsetActiveSpread');
    }*/

}
