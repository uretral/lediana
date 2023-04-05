<?php

namespace App\Traits\Editor;

trait LayoutCoverMaterial
{
    public function onSetCoverAttributes($coverTypeId, $materialId, $spreadId){
        $this->printout->spreads->find($spreadId)->update([
            'cover_type_id' => $coverTypeId,
            'cover_material_id' => $materialId,
        ]);
    }
}
