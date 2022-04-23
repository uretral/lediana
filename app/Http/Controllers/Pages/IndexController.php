<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Blocks\PromoCard;
use App\Models\Blocks\Promotion;
use App\Models\Page;
use App\Traits\Settings;

class IndexController extends Controller
{
    use Settings;

    private int $pageId = 1;

    public function index(){
        $this->init();

        return view('index',[
            'promoCards' => $this->getPromoCards(),
            'page' => $this->getPage()
        ]);
    }

    public function getPromoCards() {
        try {
            return PromoCard::where('active',1)->with(['page'])->get();
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function getPage(){
        try {
            return Page::where('id',$this->pageId)->with(['promotion'])->first();
        } catch (\Exception $e) {
            dd($e);
        }

    }

}
