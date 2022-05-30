<?php

namespace App\Classes;

use App\Http\Controllers\PrintoutController;
use App\Models\Printout\Printout;

class PrintoutStorage
{
    public PrintoutController $printout;

    public function __construct()
    {
        $this->printout = new PrintoutController();
    }

    public function add($product_id, $size_id){
        try {
//                $printout = $this->printout->create($product_id, $size_id);
            $printout = Printout::create(['product_id' => $product_id, 'size_id' => $size_id]);
            return $printout;
        } catch (\Exception $e) {
            dd($e);
        }
//        if(session()->has('printouts')){
//
//            session(['printouts' => [$printout]]);
//            $printouts = request()->session()->get('printouts');
//        } else {
//            return session();
//        }
    }
}
