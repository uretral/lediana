<?php

namespace App\Traits\Editor;

trait FormatSelector
{


    public function onFormatChanged($size_id)
    {
        $this->printout->size_id = $size_id;
        $this->printout->save(['size_id' => $size_id]);
    }


    // helpers
    public function groupedSizes()
    {
        return $this->printout->sizes
            ->where('size.ratio_id', $this->printout->size->ratio_id)
            ->groupBy('format.title');
    }
}
