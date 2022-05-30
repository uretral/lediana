<?php

namespace App\Traits\Editor;

use App\Models\Printout\PrintoutSpread;
use Encore\Admin\Grid\Model;
use Illuminate\Database\Eloquent\Collection;

trait SpreadComposer
{
    public ?PrintoutSpread $cover = null;
    public ?PrintoutSpread $oddSpread = null;
    public ?PrintoutSpread $evenSpread = null;
    public ?PrintoutSpread $activeSpread = null;

    // helpers
    public function cover()
    {
        $this->cover = $this->printout->spreads->where('spread_nr', 0)->first();
    }

    public function oddSpread()
    {
        if ($this->printout->current_spread_nr)
            $this->oddSpread = $this->printout->spreads->where('spread_nr', $this->printout->current_spread_nr)->first();
    }

    public function evenSpread()
    {
        if ($this->printout->current_spread_nr)
            $this->evenSpread = $this->printout->spreads->where('spread_nr', $this->printout->current_spread_nr + 1)->first();
    }

    public function leftDoubleSliderArrowState(): string
    {
        return $this->printout->current_spread_nr ? '' : 'disabled';
    }

    public function rightDoubleSliderArrowState(): string
    {
        return $this->printout->spreads_cnt <= $this->printout->current_spread_nr + 2 ? 'disabled' : '';
    }

    public function leftDoubleSliderArrowClick()
    {
        if ($this->printout->current_spread_nr == 1) {
            $this->onSpreadsChanged($this->printout->current_spread_nr - 1, 'doubleSpreadChange');
            $this->unsetActiveSpread();
        }
        if ($this->printout->current_spread_nr) {
            $this->printout->current_spread_nr % 2
                ? $this->onSpreadsChanged($this->printout->current_spread_nr - 2, 'doubleSpreadChange')
                : $this->onSpreadsChanged($this->printout->current_spread_nr - 1, 'doubleSpreadChange');
            $this->unsetActiveSpread();
        }
    }

    public function rightDoubleSliderArrowClick()
    {
        if ($this->rightDoubleSliderArrowState() !== 'disabled') {
            $this->printout->current_spread_nr % 2
                ? $this->onSpreadsChanged($this->printout->current_spread_nr + 2, 'doubleSpreadChange')
                : $this->onSpreadsChanged($this->printout->current_spread_nr + 1, 'doubleSpreadChange');
            $this->unsetActiveSpread();
        }
    }


    // Высота страницы разворота исходя из формата
    public function layoutDoubleSpreadStyle(): string
    {
        $size = $this->printout->size;
        $value = (369 / $size->width * $size->height);
        return 'style="--h: ' . $value . ';"';
    }

    public function activeOddSpreadEvent(){
        $this->onSetActiveSpread($this->oddSpread->spread_nr);
    }

    public function activeEvenSpreadEvent(){
        $this->onSetActiveSpread($this->evenSpread->spread_nr);
    }

    // Установка страницы разворота для манипуляций
    public function onSetActiveSpread($spread_nr)
    {
        $this->activeSpread = $this->printout->spreads->where('spread_nr', $spread_nr)->first();
        $this->setActiveAttributes();
    }

    // Активация атрибутов в соответствии с текущей моделью страницы разворота
    public function setActiveAttributes(){
        $layout = $this->activeSpread ? $this->getActiveLayout($this->activeSpread->layout_id) : null;
        $this->printout->current_template_id = $layout ? $layout->template->id: self::DEFAULT_TEMPLATE_ID;
        $this->printout->push();
    }

    public function getActiveLayout($layout_id)
    {
        if ($layout_id) {
            $layout = $this->printout->layouts->where('id', $layout_id)->first();
        }
        return $layout ?? null;
    }

    public function unsetActiveSpread(){
        $this->activeSpread = null;
        $this->printout->current_template_id = self::DEFAULT_TEMPLATE_ID;
        $this->printout->push();
//        $this->emit('unsetActiveSpread');
        $this->dispatchBrowserEvent('unsetActiveSpread');
    }

}
