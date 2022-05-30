<?php

namespace App\Admin\Classes\PageExtender;

use App\Admin\Classes\PageExtender;

class PageSize extends PageExtender
{
    public function __construct($form, ...$args)
    {
        parent::__construct($form, $args);
    }

}
