<?php

namespace App\Traits\Editor;

use App\Models\Layout\Layout;
use App\Models\Printout\PrintoutPhoto;
use App\Models\Printout\PrintoutSpread;
use App\Models\Printout\PrintoutText;
use App\Services\PrintoutService;

trait LayoutSpreadThumbs
{
    public ?PrintoutSpread $active_spread = null;
    public $currentLayouts;

    public function defineLayouts()
    {
        return $this->printout->layouts->where(
            'template.id',
            $this->printout->current_template_id ?? self::DEFAULT_TEMPLATE_ID
        );
    }

    public function onSetSpreadLayout($layoutId, $templateId, $spreadId)
    {

        if ($templateId == 4) {
            $this->wideSpread($layoutId, $templateId, $spreadId);
        } else {
            $this->singleSpread($layoutId, $templateId, $spreadId);
        }
//        $this->updatePrintout();

    }

    public function removeTextAndPhotos($spreadId){
        PrintoutPhoto::where('spread_id', $spreadId)->delete();
        PrintoutText::where('spread_id', $spreadId)->delete();
    }


    private function wideSpread($layoutId, $templateId, $spreadId)
    {
        $arrSpreadsId = $this->getButtonSpreadsProperty($spreadId);
        // заменяемый был широким - просто меняем лэйаут
        if (count($arrSpreadsId) === 1) {
            $this->removeTextAndPhotos($spreadId);
            $this->printout->spreads()->find($spreadId)->update([
                'layout_id' => $layoutId,
                'template_id' => $templateId
            ]);
        }
        // заменяемый был одинарным - к первому применяем параметры, второй save delete
        if (count($arrSpreadsId) === 2) {
            $this->removeTextAndPhotos($arrSpreadsId[0]);
            $this->printout->spreads()->find($arrSpreadsId[0])->update([
                'layout_id' => $layoutId,
                'template_id' => $templateId
            ]);
            $this->removeTextAndPhotos($arrSpreadsId[1]);
            $this->printout->spreads()->find($arrSpreadsId[1])->delete();
//            $this->printout->spread
            $this->printout->update([
                'current_spread_id' => $arrSpreadsId[0]
            ]);

        }
    }

    private function singleSpread($layoutId, $templateId, $spreadId)
    {
        $this->removeTextAndPhotos($spreadId);
        $spread =  $this->printout->spreads()->find($spreadId);
        // заменяемый был широким - обновляем параметры у первого, восстанавливаем следующий
        if ($spread->template_id == 4) {

            $this->printout->spreads()->find($spreadId)->update([
                'layout_id' => $layoutId,
                'template_id' => $templateId
            ]);
            PrintoutSpread::withTrashed()->where('id',$spreadId + 1)->restore();

        } else {
            $spread->update([
                'layout_id' => $layoutId,
                'template_id' => $templateId
            ]);
        }
    }





    public function unsetEvenSpreadAttributes($layout_id, $template_id)
    {
        $this->oddSpread->layout_id = $layout_id;
        $this->oddSpread->template_id = $template_id;
        $this->oddSpread->push();

        $this->evenSpread->layout_id = null;
        $this->evenSpread->template_id = null;
        $this->evenSpread->push();
    }




}
