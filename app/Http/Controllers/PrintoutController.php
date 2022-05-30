<?php

namespace App\Http\Controllers;

use App\Models\Printout\Printout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PrintoutController
{

    private Printout $printout;

    public function __construct()
    {
        $this->printout = new Printout();
    }

    public function create($product_id, $size_id)
    {
        try {
          return $this->printout->create(['product_id' => $product_id, 'size_id' => $size_id]);
//            return Printout::create(['product_id' => $size_id]);
        } catch (\Exception $e) {
           Log::error($e);
        }
    }

}
