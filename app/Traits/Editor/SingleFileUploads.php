<?php

namespace App\Traits\Editor;
use App\Models\Photo;
use App\Models\Printout\PrintoutPhoto;
use Intervention\Image\ImageManager;
use Livewire\TemporaryUploadedFile;

trait SingleFileUploads
{

    public function updatedTmpPhotos() {
        $this->validate([
            'tmpPhotos.*' => 'image|max:30000',
        ]);

        foreach ($this->tmpPhotos as $photo) {
            $this->saveImage($photo);
        }
        $this->tmpPhotos = [];
    }


    public function save()
    {
        $this->validate([
            'tmpPhotos.*' => 'image|max:30000',
        ]);

        foreach ($this->tmpPhotos as $photo) {
            $this->saveImage($photo);
        }
        $this->tmpPhotos = [];
    }

    public function updatedPhoto()
    {
        $this->validate([
            'tmpPhotos' => 'image|max:30000',
        ]);
    }

    public function saveImage($photo){
        $stored = $photo->store('public/photos/original/' . $this->printout_id);
        \Storage::disk('local')->makeDirectory( 'public/photos/thumbs/' . $this->printout_id);
        $img = \Image::make(storage_path('app/'.$stored))->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save(storage_path('app/public/photos/thumbs/'.$this->printout_id.'/'.$img->basename));
        $this->printout->pics()->create(['photo' => $img->basename]);
    }

    public function removeTmpPhoto($key)
    {
        unset($this->tmpPhotos[$key]);
    }
    public function onRemovePhoto(Photo $photo){
        $photo->delete();
    }

}
