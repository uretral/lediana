<?php

namespace App\Services;

use App\Models\Item\ItemCoverMaterial;
use App\Models\Item\ItemCoverType;
use App\Models\Item\ItemSize;
use App\Models\Layout\Layout;
use App\Models\Printout\Printout;

class PrintoutSessionService
{
    const SECTION_KEY = 'printouts';
    private int $product_id;
    private int $size_id;
    private $layout_id = null;
    private array $printouts;








    private function init($item, $layout_id)
    {
        $this->product_id = $item['product_id'];
        $this->size_id = $item['id'];
        $this->layout_id = $layout_id;
        if (!request()->session()->has(self::SECTION_KEY)) {
            request()->session()->put(self::SECTION_KEY, []);
        }
        $this->printouts = request()->session()->get(self::SECTION_KEY);
    }

    public function get($item, $layout_id = null, $size_id = null)
    {
        $this->init($item, $layout_id);

        if ($this->printouts) {
            array_key_exists($this->product_id, $this->printouts) ? $this->update($size_id) : $this->add();
        } else {
            $this->add();
        }

        return Printout::where('id', $this->printouts[$this->product_id])->first();
    }

    private function add()
    {
        $arParams = ['product_id' => $this->product_id, 'size_id' => $this->size_id];
        if (in_array($this->product_id, [1, 2, 3, 4])) {
            $printout = $this->createPrintoutWithFirstSpread($arParams);
        } else {
            $printout = $this->createPrintout($arParams);
        }
        $this->printouts[$this->product_id] = $printout->id;
        $this->putPrintouts();
    }

    private function update($size_id)
    {
        $service = new PrintoutService();

        $printout = Printout::find($this->printouts[$this->product_id]);
        dd($this->printouts[$this->product_id], session('printouts'), $printout->size_id);
        $printout = $service->get($this->printouts[$this->product_id]);


        if ($printout->size_id !== $size_id) { // ItemSize::find($printout->size_id)->ratio_id !== ItemSize::find($this->size_id)->ratio_id
            $service->destroy($this->printouts[$this->product_id]);
            $this->createFirstSpread($printout);
            $printout->update([
                'size_id' => $size_id
            ]);

        }


        Printout::where('id', $this->printouts[$this->product_id])->update(['size_id' => $this->size_id]);

    }

    public function createFirstSpread(Printout $printout)
    {
        $printout->current_spread_nr = 0;
        $printout->spreads_cnt = 1;
        $spread = $printout->spread()->create([
            'printout_id' => $printout->id,
            'spread_nr' => 0,
            'layout_id' => $this->layout_id,
        ]);
        $printout->current_spread_id = $spread->id;
        $printout->push();
    }

    private function putPrintouts()
    {
        request()->session()->forget(self::SECTION_KEY);
        request()->session()->put(self::SECTION_KEY, $this->printouts);
    }

    private function createPrintout($arParams): Printout
    {
        return Printout::create($arParams);
    }

    public function createPrintoutWithFirstSpread($arParams)
    {
        $arParams['current_spread_nr'] = 0;
        $arParams['spreads_cnt'] = 1;
        $printout = Printout::create($arParams);
        $spread = $printout->spread()->create([
            'printout_id' => $printout->id,
            'spread_nr' => 1,
            'layout_id' => $this->layout_id,
            'cover_type_id' => in_array($printout->product_id,[1,25958985]) ? 1 : null,
            'cover_material_id' => in_array($printout->product_id,[1,25958985]) ? 1 : null
        ]);
        $printout->current_spread_id = $spread->id;
        $printout->push();
        return $printout;
    }

}

//ItemCoverType::
//ItemCoverMaterial::
