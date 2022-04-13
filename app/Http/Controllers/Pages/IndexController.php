<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Blocks\PromoCard;
use App\Models\Blocks\Promotion;
use App\Models\Page;

class IndexController extends Controller
{

    private int $pageId = 1;

    public function index(){
        return view('index',[
            'promoCards' => $this->getPromoCards(),
            'page' => $this->getPage()
        ]);
    }

    public function getPromoCards() {
        return PromoCard::where('active',1)->with(['page'])->get();
    }

    public function getPage(){
        return Page::where('id',$this->pageId)->with(['promotion'])->first();
    }

}
