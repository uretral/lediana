<?php

namespace App\Helpers;

use App\Models\Printout\PrintoutSpread;

class Styles
{

    public function photoStyle($photo, $z = 0): string
    {
        $style = 'top: ' . $photo->top . '%; ';
        $style .= 'right: ' . $photo->right . '%; ';
        $style .= 'bottom: ' . $photo->bottom . '%; ';
        $style .= 'left: ' . $photo->left . '%; ';
        if($z > 0) {
            $style .= 'z-index: ' . $z . '; ';
        }
        return $style;
    }

    public function textStyle($txt){
        $style = $txt->font_name;
        $style .= $txt->font_size;
        $style .= $txt->font_color;
        return $style;
    }


    public function cornersClass($corners): string
    {
        $class = '';
        if ($corners->top == 0.00) {
            $class .= 't';
        }
        if ($corners->bottom == 0.00) {
            $class .= 'b';
        }
        if ($corners->left == 0.00) {
            $class .= 'l';
        }
        if ($corners->right == 0.00) {
            $class .= 'r';
        }
        return $class;
    }

    public function classWide(PrintoutSpread $printoutSpread): string
    {
        return $printoutSpread->template_id === 4 ? 'wide' : '';
    }


}
