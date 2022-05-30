<?php

namespace App\Traits\Editor;

trait LayoutCoverThumbs
{

    public function onSetLayout($layout_id){
        $this->printout->spread->layout_id = $layout_id;
        $this->printout->spread->push();
    }
}
