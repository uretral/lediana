<?php

namespace App\Traits\Editor;

use App\Models\Printout\PrintoutSpread;

trait CubeSpreadComposer
{

    public ?PrintoutSpread $activeSpread = null;

    public function getOddSpreadProperty(): ?PrintoutSpread
    {
        $spreadsNumbers = $this->arrSpreads[$this->printout->spread_view];
        $spread = is_array($spreadsNumbers)
            ? $this->printout->spreads()->where('spread_nr', $spreadsNumbers[0])->first()
            : $this->printout->spreads()->where('spread_nr', $spreadsNumbers)->first();
//        dd($spreadsNumbers, $spread);
        if (config('app.env') === 'local')
            $this->viewOdd = $spread->toArray();

        return $spread;
    }

    public function getEvenSpreadProperty(): ?PrintoutSpread
    {
        $spreadsNumbers = $this->arrSpreads[$this->printout->spread_view];
        $spread = is_array($spreadsNumbers)
            ? $this->printout->spreads()->where('spread_nr', $spreadsNumbers[1])->first()
            : null;

        if (config('app.env') === 'local')
            $this->viewEven = $spread ? $spread->toArray() : null;

        return $spread;
    }

    public function setDouble() {
        $this->printout->spreads()->where('spread_nr',$this->spreadOddNr)->update(['is_double' => 1]);
        $this->printout->spreads()->where('spread_nr',$this->spreadEvenNr)->delete();
    }

    public function unsetDouble() {
        $this->printout->spreads()->where('spread_nr',$this->spreadOddNr)->update(['is_double' => 0]);
        PrintoutSpread::where('printout_id', $this->printout_id)->where('spread_nr',$this->spreadEvenNr)->restore();
    }
}

