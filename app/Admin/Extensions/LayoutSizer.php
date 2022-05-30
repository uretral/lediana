<?php

namespace App\Admin\Extensions;

class LayoutSizer extends \Encore\Admin\Form\Field
{

    protected static $js = ['https://unpkg.com/draggabilly@3/dist/draggabilly.pkgd.js'];
    protected static $css = ['/css/admin-layout-sizer.css'];

    public function render()
    {
        return view('admin.layout-sizer')->with('data',$this->data);

    }
}
