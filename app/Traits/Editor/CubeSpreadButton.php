<?php

namespace App\Traits\Editor;

use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutSpread;

trait CubeSpreadButton
{

    public array $arrSpreads = [
        1, 2, 3, 4, 5, 6, [7, 8], [9, 10], 11, 12
    ];

    public array $doubleSpreadKeys = [6, 7];

    // computed
    public function getSpreadsProperty()
    {
        return $this->printout->spreads;
    }

    public function getSpreadKeysProperty()
    {
        return $this->arrSpreads[$this->printout->spread_view];
    }

    public function getSpreadOddNrProperty()
    {
        return $this->arrSpreads[$this->printout->spread_view][0];
    }

    public function getSpreadEvenNrProperty()
    {
        return $this->arrSpreads[$this->printout->spread_view][1];
    }


    // end of computed

    public function firstOrCreateSpread($nr)
    {
        return $this->printout->spreads()->firstOrCreate(['spread_nr' => $nr], ['layout_id' => 169]);
    }

    public function setSpreadButtonSingle($key)
    {
        $spread = $this->firstOrCreateSpread($this->arrSpreads[$key]);
        $this->printout->update([
            'current_spread_nr' => $spread->spread_nr,
            'current_spread_id' => $spread->id,
            'spread_view' => $key,
        ]);

    }

    public function setSpreadButtonDouble($spreadKey)
    {
        foreach ($this->arrSpreads[$spreadKey] as $key => $nr) {
            if ($key === 0) {
                $spread = $this->firstOrCreateSpread($nr);
                $this->printout->update([
                    'current_spread_nr' => $spread->spread_nr,
                    'current_spread_id' => $spread->id,
                    'spread_view' => $spreadKey,
                ]);

                if ($spread->is_double)
                    break;

            } else {
                $this->firstOrCreateSpread($nr);
            }
        }
    }


    public function prevNextCubeSpread($add)
    {
        $spreadView = $this->printout->spread_view + $add;
        is_array($this->arrSpreads[$this->printout->spread_view + $add])
            ? $this->setSpreadButtonDouble($spreadView)
            : $this->setSpreadButtonSingle($spreadView);
    }


}
