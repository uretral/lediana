<?php

namespace App\Traits\Editor;

trait LayoutCoverThumbs
{

    public function getLayoutCoverThumbsProperty() {
       return $this->printout->layouts->where('template_id',1);
    }



    public function onSetCoverLayout($layout_id){
        $this->cover->layout_id = $layout_id;
        $this->cover->push();
    }
}
