<?php

namespace App\Traits\Editor\Modals;

trait CubeModal
{
    public bool $modal = false;

    public function modalView($value = false)
    {
        $this->modal = $value;
    }

}
