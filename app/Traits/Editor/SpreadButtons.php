<?php

namespace App\Traits\Editor;


trait SpreadButtons
{
    //  Клик на кнопку разворота
    public function onSpreadsChanged($i, $method = null)
    {
        if ($method){
            call_user_func_array([__CLASS__, $method], [$i]);
        }

        if($i){
            $this->oddSpread();
            $this->evenSpread();
        } else {
            $this->cover();
        }
    }


    // Клик на кнопки + -
    public function onSpreadsQtyChange($qty, bool $plus = false)
    {
        for ($item = 1; $item <= $qty; $item++) {
            $plus ? $this->spreadAdd() : $this->spreadRemove();
        }
    }

    // количество страниц
    public function spreadsCount(): int
    {
        if ($this->printout->spreads_cnt != $this->printout->spreads()->count()) {
            $this->printout->update(['spreads_cnt' => $this->printout->spreads()->count()]);
        }
        return $this->printout->spreads_cnt;
    }


    // для разворотов
    private function doubleSpreadChange($i)
    {
        $this->printout->update(['current_spread_nr' => $i]);
        $this->unsetActiveSpread();
    }

    // для простых страниц
    private function singleSpreadChange($i)
    {
        $this->printout->update(['current_spread_nr' => $i]);
    }


    private function spreadAdd()
    {
        $this->printout->spreads()->create([
            'printout_id' => $this->printout->id,
            'spread_nr' => $this->printout->spreads()->count()]);
    }

    private function spreadRemove()
    {
        if($this->printout->current_spread_nr !== 0){
            $this->printout->current_spread_nr = 0;
            $this->printout->push();
        }
        $last = $this->printout->spreads->pop();
        $this->printout->spreads()->where('id', $last->id)->where('printout_id',$last->printout_id)->delete();
        $this->printout->photos()->where('spread_nr', $last->spread_nr)->where('printout_id',$last->printout_id)->delete();
    }

}
