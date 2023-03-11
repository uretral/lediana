<?php

namespace App\Traits\Editor;

trait Orientation
{

    public function changeOrientation() {
        $this->printout->photos()->where('spread_id', $this->spread->id)->delete();
        $this->spread->orientation = !$this->spread->orientation;
        $this->spread->push();
    }

}
