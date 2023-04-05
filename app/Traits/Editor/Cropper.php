<?php

namespace App\Traits\Editor;

use App\Models\Layout\Layout;
use App\Models\Layout\LayoutPhoto;
use App\Models\Printout\PrintoutSpread;
use Illuminate\Support\Facades\Request;

trait Cropper
{

    public ?int $layout = null;

    public function onImageRemove($id)
    {
        $this->printout->photos()->find($id)->delete();
    }

    public function onImageSaveEvent($layout_photo_id, $spread_nr, $layout_id, $photo_id, $html, $cropData, $spreadId)
    {
        $this->printout->photos()->updateOrCreate([
            'printout_id' => $this->printout_id,
            'spread_nr' => $spread_nr,
            'layout_id' => $layout_id,
            'layout_photo_id' => $layout_photo_id,
            'spread_id' => $spreadId
        ], [
                'photo_id' => $photo_id,
                'html' => $html,
                'cropper' => $cropData,
                'spread_id' => $spreadId
            ]
        );

    }

    public function onPhotoRemove($photo_id)
    {
        $this->printout->photos()->where('id', $photo_id)->delete();
    }

    public function unsetPhotos()
    {
        $this->printout->photos()->where('spread_nr', $this->activeSpread->spread_nr)->delete();
    }

    public function getPhotoHtml(PrintoutSpread $spread, LayoutPhoto $photo)
    {
        $res = $this->printout->photos()
//            ->where('spread_nr', $spread->spread_nr)
            ->where('spread_id', $spread->id)
            ->where('layout_id', $photo->layout_id)
            ->where('layout_photo_id', $photo->id)
            ->first();
        if ($res && $res->html) {
            $res->html = str_replace('<img', '<img class="photo-cropped" rel="' . $res->id . '" data-id="' . $res->photo_id . '"', $res->html);
        }
        return $res;
    }

    public function getPhotoBgHtml(PrintoutSpread $spread)
    {
        $res = $this->printout->photos()
            ->where('spread_id', $spread->id)
            ->where('layout_id', 169)
            ->where('layout_photo_id', null)
            ->first();
        if ($res && $res->html) {
            $res->html = str_replace('<img', '<img class="photo-cropped" rel="' . $res->id . '" data-id="' . $res->photo_id . '"', $res->html);
        }
        return $res;
    }


}
