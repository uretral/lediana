<?php

namespace App\Traits\Editor;

use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutSpread;

trait SingleSpreadButton
{

    // computed
    public function getSpreadsProperty()
    {
        return $this->printout->spreads;
    }




    // Single /////////////////////////////////////////////////////////////////////////

    // Клик  на кнопки + -
    public function spreadAdd()
    {
        $this->printout->update([
            'cost' => $this->spreadPrice * ($this->printout->spreads_cnt + 1)
        ]);
        $this->printout->spreads()->create([
            'printout_id' => $this->printout->id,
            'spread_nr' => $this->printout->spreads()->count(),
            'layout_id' => $this->defineLayoutId(),
        ]);
    }

    public function spreadRemove()
    {
        tap($this->printout->spreads->last(), function (PrintoutSpread $spread) {
            $this->printout->photos()->where('spread_id', $spread->id)->delete();
            $this->printout->update(['current_spread_id' => $this->printout->spreads->first()->getAttribute('id')]);
            $spread->delete();
        });
    }

    public function defineLayoutId(): ?int
    {

        if ($this->printout->size_id == 49) {
            return 168;
        } else {
            return 169;
        }

    }

    // для простых страниц
    public function singleSpreadChange($id)
    {
        $this->printout->update(['current_spread_id' => $id]);

    }

    // Double /////////////////////////////////////////////////////////////////////////




    // количество страниц
    public function spreadsCount(): int
    {

        if ($this->printout->spreads_cnt != $this->printout->spreads()->count()) {
            $this->printout->update(['spreads_cnt' => $this->printout->spreads()->count()]);
        }

        return $this->printout->spreads_cnt;
    }




}
