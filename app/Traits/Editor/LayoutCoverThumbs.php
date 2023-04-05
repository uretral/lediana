<?php

namespace App\Traits\Editor;

use App\Models\Printout\PrintoutPhoto;
use App\Models\Printout\PrintoutSpread;

trait LayoutCoverThumbs
{

    public function getLayoutCoverThumbsProperty() {
       return $this->printout->layouts->where('template_id',1);
    }

    public function setCoverLayout($layoutId,$spreadId) {
        PrintoutPhoto::where('spread_id',$spreadId)->delete();
        $this->printout->spread()->update([
            'layout_id' => $layoutId
        ]);
    }

    public function onSetCoverLayout($layout_id){
        dump($this->printout->spread);


/*        $this->printout->spread()->update([
            'layout_id' => $layout_id
        ]);*/
    }
}
