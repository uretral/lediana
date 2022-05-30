<?php

namespace App\Traits\Editor;

trait LayoutCoverMaterial
{
    public function onSetCoverAttributes($cover_type_id, $material_id){
        $this->printout->spread->cover_type_id = $cover_type_id;
        $this->printout->spread->cover_material_id = $material_id;
        $this->printout->spread->push();
    }
}
