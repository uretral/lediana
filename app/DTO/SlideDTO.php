<?php

namespace App\DTO;

use \Spatie\DataTransferObject\DataTransferObject;


class SlideDTO extends DataTransferObject
{

    public int $id;
    public int $sort;
    public string $title;
    public string $text;
    public string $img;
    public string $img_mobile;

}
