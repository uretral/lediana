<?php

namespace App\Traits\Editor;


use App\Models\Printout\PrintoutSpread;

trait SpreadButtons
{

    public function getButtonKeyProperty()
    {
        $res = null;
        foreach ($this->buttons as $key => $btn) {
            if (in_array($this->printout->spread->id, $btn['spreads'])) {
                $res = $key;
            }
        }
        return $res;
    }

    public function getButtonSpreadsProperty()
    {
        $res = [];
        foreach ($this->buttons as $key => $btn) {
            if (in_array($this->printout->spread->id, $btn['spreads'])) {
                $res = $btn['spreads'];
            }
        }
        return $res;
    }

    public function getButtonsProperty(): array
    {

        $cnt = 1;
        $btnArray = [];
        $key = 1;
        $total = $this->printout->spreads->count();

        if ($total > 1)
            do {
                if ($this->printout->spreads[$key]->template_id == 4) {
                    $btnArray[] = [
                        'numbers' => [$cnt++, $cnt++],
                        'spreads' => [$this->printout->spreads[$key++]->id]
                    ];
                } else {
                    $btnArray[] = [
                        'numbers' => [$cnt++, $cnt++],
                        'spreads' => [$this->printout->spreads[$key++]->id, $this->printout->spreads[$key++]->id]
                    ];
                }

            } while ($key < $total);

        return $btnArray;
    }

    // Клик на кнопки + -
    public function spreadAddRemove($qty, bool $plus = false)
    {
        for ($item = 1; $item <= $qty; $item++) {
            if ($plus) {
                $this->addDoubleSpread();
            } else {
                $spread = tap(
                    PrintoutSpread::where('printout_id', $this->printout->id)->orderBy('id', 'desc')->first(),
                    function (PrintoutSpread $spread) {
                        $this->printout->photos()->where('spread_id', $spread->id)->delete();
                        $this->printout->update([
                            'current_spread_id' => $this->printout->spreads->first()->getAttribute('id'),
                            'current_spread_nr' => 0
                        ]);
                    });
                $spread->delete();

                if ($spread->template_id == 4) {
                    break;
                }
            }
        }
    }

    public function addDoubleSpread()
    {
        $this->printout->spreads()->create([
            'printout_id' => $this->printout->id,
            'spread_nr' => $this->printout->spreads()->count(),
            'layout_id' => null,
        ]);
    }

    //  Клик на кнопку обложки
    public function doubleCoverChange()
    {
        $this->printout->update([
            'current_spread_nr' => 0,
            'current_spread_id' => $this->printout->spreads()->first()->getAttribute('id'),
        ]);
    }

    //  Клик на кнопку разворота
    public function doubleSpreadChange($key)
    {
        $this->printout->update([
            'current_spread_nr' => $key >= 0
                ? $this->printout->spreads->find($this->buttons[$key]['spreads'][0])->getAttribute('spread_nr')
                : 0,
            'current_spread_id' => $key >= 0
                ? $this->buttons[$key]['spreads'][0]
                : $this->printout->spreads->first()->getAttribute('id'),
        ]);
    }

}
