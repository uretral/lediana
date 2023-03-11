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
        'size.format', 'size.attributes','size.cover.cover', 'size.attributes.attributes',
        'layouts.photos', 'layouts.texts', 'layouts.template', 'layouts.type',
        'layout.photos', 'layout.texts',
        'sizes.format', 'sizes.size',
        'spreads.bg', 'spreads.layout', 'spreads.spreadTexts',

        'spread.bg', 'spread.layout',
        'photos', 'texts',
//        'cover',
        'pics'//
    ];

    public function get($id)
    {
        $printout = Printout::with(['spread'])->whereId($id)->first();



/*        if(!$printout->spreads->count()) {
            $printoutSessionService = new PrintoutSessionService();
            dd($printout->spreads->count());
        }*/


        return Printout::whereId($id)->whereHas('spread')->with([
            'spread' => function ($query) use ($id) {
                $query->where('printout_id', $id);
            },
            'prices' => fn($query) => $query->where('size_id', $printout->size_id), // $query->where('size_id', $id) =>  fn($query) => dump($this)
            'size.format', 'size.attributes', 'size.cover.cover', 'size.attributes.attributes',
            'layouts.photos', 'layouts.texts', 'layouts.template', 'layouts.type',
            'layout.photos', 'layout.texts',
            'sizes.format', 'sizes.size',
            'spreads.bg', 'spreads.layout', 'spreads.spreadTexts', 'spreads.color',

            'spread.bg', 'spread.layout', 'spread.photos', 'spread.texts', 'spread.color', 'spread.layout.photos', 'spread.layout.texts',
            'photos', 'texts',
//        'cover',
            'pics'//
        ])->first();
    }

    public function coverTypes()
    {
        return ItemCoverType::all();
    }

    public function coverMaterials()
    {
        return ItemCoverMaterial::all();
    }

    public function spreadBg()
    {
        return ItemSpreadColor::all();
    }

    public function spread($nr)
    {
        return PrintoutSpread::with([
            'bg', 'layout', 'layout.photos', 'layout.texts'
        ])->where('spread_nr', $nr)->first();
    }

    public function destroy($id)
    {
        $printout = $this->get($id);
        $printout->spreads()->delete();
        $printout->texts()->delete();
        $printout->photos()->delete();
    }


}
