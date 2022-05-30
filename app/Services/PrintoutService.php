<?php

namespace App\Services;

use App\Models\Item\ItemCoverMaterial;
use App\Models\Item\ItemCoverType;
use App\Models\Item\ItemSpreadColor;
use App\Models\Layout\LayoutTemplate;
use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutSpread;

class PrintoutService
{
    private int $id;

    private array $with = [
        'size.format','size.attributes', 'size.cover.cover',
        'layouts.photos', 'layouts.texts','layouts.template', 'layouts.type',
        'layout.photos', 'layout.texts',
        'sizes.format', 'sizes.size',
        'spreads.bg','spreads.layout','spreads.spreadTexts',
        'spread.bg','spread.layout', 'spread.layout',
        'photos','texts',
        'pics'//
    ];

    public function get($id)
    {
        return Printout::whereId($id)->with($this->with)->first();
    }

    public function coverTypes(){
        return ItemCoverType::all();
    }

    public function coverMaterials(){
        return ItemCoverMaterial::all();
    }

    public function spreadBg(){
        return ItemSpreadColor::all();
    }

    public function spread($nr) {
       return PrintoutSpread::with([
            'bg','layout','layout.photos','layout.texts'
        ])->where('spread_nr', $nr)->first();
    }


}
