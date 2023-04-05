<?php

namespace App\Services;

use App\Models\Item\ItemCoverMaterial;
use App\Models\Item\ItemCoverType;
use App\Models\Item\ItemSize;
use App\Models\Item\ItemSpreadColor;
use App\Models\Layout\LayoutTemplate;
use App\Models\Photo;
use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutPhoto;
use App\Models\Printout\PrintoutSpread;
use App\Models\Printout\PrintoutText;
use Illuminate\Support\Facades\Storage;

class PrintoutService
{
    const SESSTION_KEY = 'printouts';
    private int $id;
    protected array $withSize = ['size.format', 'size.attributes', 'size.cover.cover', 'size.attributes.attributes'];
    protected array $withSizes = ['sizes.format', 'sizes.size'];
    protected array $withLayout = ['layout.photos', 'layout.texts'];
    protected array $withLayouts = ['layouts.photos', 'layouts.texts', 'layouts.template', 'layouts.type'];
    protected array $withSpread = ['spread.bg', 'spread.layout', 'spread.photos', 'spread.texts', 'spread.color', 'spread.layout.photos', 'spread.layout.texts'];
    protected array $withSpreads = ['spreads.bg', 'spreads.layout', 'spreads.spreadTexts', 'spreads.color'];


    private array $with = [
        'size.format', 'size.attributes', 'size.cover.cover', 'size.attributes.attributes',
        'layouts.photos', 'layouts.texts', 'layouts.template', 'layouts.type',
        'layout.photos', 'layout.texts',
        'sizes.format', 'sizes.size',
        'spreads.bg', 'spreads.layout', 'spreads.spreadTexts',

        'spread.bg', 'spread.layout',
        'photos', 'texts',
//        'cover',
        'pics'//
    ];

    public function getSpread($id)
    {
        return PrintoutSpread::with($this->withSpread)->find($id);
    }

    public function get($id)
    {
        $printout = Printout::with(['spread'])->whereId($id)->first();

        return Printout::whereId($id)->whereHas('spread')->with([
            'spread' => function ($query) use ($id) {
                $query->where('printout_id', $id);
            },
            'prices' => fn($query) => $query->where('size_id', $printout->size_id),
            ...$this->withSize,
            ...$this->withLayouts,
            ...$this->withLayout,
            ...$this->withSizes,
            ...$this->withSpread,
            ...$this->withSpreads,
            'photos', 'texts',
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


    public function create(ItemSize $itemSize, int $layoutId): Printout
    {
        $printout = Printout::create([
            'product_id' => $itemSize->product_id,
            'size_id' => $itemSize->id,
            'current_spread_nr' => 1,
            'spread_view' => 0,
        ]);
        $printout->update([
            'current_spread_id' => $this->firstSpread($printout, $layoutId),
            'current_spread_nr' => 1
        ]);
        return $printout;
    }

    public function update(ItemSize $itemSize, Printout $printout, $layoutId) {
//        dd($printout->id, $layoutId);
        PrintoutPhoto::where('printout_id',$printout->id)->delete();
        PrintoutText::where('printout_id',$printout->id)->delete();
        PrintoutSpread::where('printout_id',$printout->id)->forceDelete();
        $spread = PrintoutSpread::create([
            'printout_id' => $printout->id,
            'spread_nr' => 1,
            'layout_id' => $layoutId // in_array($printout->product_id,[3,258258258]) ? 168 : null
        ]);
        Printout::where('id', $printout->id)->update([
            'size_id' => $itemSize->id,
            'current_spread_id' => $spread->id,
            'current_spread_nr' => 1,
            'spread_view' => 0,
        ]);
        $this->removePhotos($printout->id);
    }


    public function firstSpread(Printout $printout, int $layoutId) {
        $spread = $printout->spread()->create([
            'printout_id' => $printout->id,
            'spread_nr' => 1,
            'layout_id' => $layoutId,
        ]);
        return $spread->id;
    }

    public function removePhotos($printoutId) {
        Photo::wherePrintoutId($printoutId)->each(function ($photo){
            Storage::delete('public/photos/original/' .$photo->photo);
            Storage::delete('public/photos/thumbs/' .$photo->photo);
        });
        Photo::wherePrintoutId($printoutId)->delete();
    }



    private function putPrintouts()
    {
        $former = request()->session()->get(self::SESSTION_KEY);
        request()->session()->forget(self::SESSTION_KEY);
        request()->session()->put(self::SESSTION_KEY, $former);
    }


}
