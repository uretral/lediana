<?php

namespace App\Traits\Editor;

use App\Models\Photo;
use App\Models\Printout\Printout;
use Illuminate\Support\Facades\Storage;

trait Delete
{

    private int $product_id;

    public function deletePrintout()
    {
        tap($this->printout, function (Printout $printout){
            $this->product_id = $printout->product_id;
            $printout->texts()->delete();
            $printout->photos()->delete();
            $printout->spreads()->delete();
            Storage::deleteDirectory('public/photos/original/'.$printout->id);
            Storage::deleteDirectory('public/photos/thumbs/'.$printout->id);
            Photo::where('printout_id',$printout->id)->delete();
            return $printout->delete();
        });

        $arrSessionPrintout = session('printouts');
        unset($arrSessionPrintout[$this->product_id]);
        session(['printouts' => $arrSessionPrintout]);

        return redirect()->to('/');
    }

}



