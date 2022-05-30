<?php

namespace App\Facades;


use App\Helpers\Styles;
use Illuminate\Support\Facades\Facade;


class EditorStyles extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Styles::class;
    }

}
