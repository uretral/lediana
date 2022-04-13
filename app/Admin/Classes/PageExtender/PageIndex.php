<?php

namespace App\Admin\Classes\PageExtender;

use App\Admin\Classes\PageExtender;
use App\Models\Blocks\Promotion;
use App\Models\Page;
use Encore\Admin\Form;

class PageIndex extends PageExtender
{
    public function __construct($form, ...$args)
    {
        parent::__construct($form, $args);

    }

}
