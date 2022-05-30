<?php

namespace App\Traits;

use App\Models\Layout\Layout;
use App\Models\Printout\Printout;
use App\Models\Printout\PrintoutSpread;
use App\Services\PrintoutService;

trait PrintoutEditorMixin
{
    public Printout $printout;
    public int $defaultTemplateId = 3;
    public int $templateId;

    public int $printout_id;

//    public object $layout;


    public function withAttribute($model,$attribute)
    {
        return $model
            ? is_null($attribute) ? $model : $model->getAttribute($attribute)
            : null;
    }


    // текущий лист
    public function spread($attribute = null)
    {
        return $this->withAttribute(
            $this->printout->spreads->where('spread_nr', $this->printout->current_spread_nr)->first(),
            $attribute
        );
    }

    // смена бэкграунда
    public function setBg($color_id){
        $spread = $this->spread();
        $spread->page_color = $color_id;
        $spread->push();
    }

    public function defaultTemplateId()
    {
        $layout = $this->spread() ? $this->spread()->getAttribute('layout_id') : null;
//        dd($this->printout);
        $this->templateId = $layout
            ? $this->printout->layouts()->where('layouts.id', $layout)->first()->getAttribute('template_id')
            : $this->defaultTemplateId;
    }


    /**
     * Изменение формата
     * @param PrintoutService $service
     * @param $payload
     * @return void
     */
    public function sizeChange($payload = null)
    {
        $this->printout->size_id = $payload;
        $this->printout->push();
    }

    public function getCurrentSize($attribute = null)
    {
        $size = $this->printout->sizes()->where('size_id', $this->printout->size_id)->first();
        return $size
            ? $attribute ? $size->size->getAttribute($attribute) : $size->size
            : null;
    }

    /**
     * ++ или -- разворотов
     * @param PrintoutService $service
     * @param $payload
     * @return void
     */
    public function spreadsQty(PrintoutService $service, $payload = false)
    {
        $payload ? $this->printout->spreads_cnt++ : $this->printout->spreads_cnt--;
        $this->printout = $service->update($this->printout);
    }

    /**
     * Переход на другой разворот
     * @param PrintoutService $service
     * @param int $currentSpread
     * @return void
     */
    public function currentSpread(int $currentSpread = 0)
    {
        $this->printout->current_spread_nr = $currentSpread;
        $this->printout->current_spread_id = $this->getSpreadId($currentSpread);
        $this->printout->push();
        $this->defaultTemplateId();

    }

    /**
     * Найти id разворота распечатки или создать новый разворот
     * @param $currentSpread
     * @return mixed
     */
    public function getSpreadId($currentSpread)
    {
        return $this->printout->spreads()->where('spread_nr', $currentSpread)
            ->firstOrCreate(['printout_id' => $this->printout->id, 'spread_nr' => $currentSpread])
            ->getAttribute('id');
    }

    public function setLayout($layout_id)
    {
        $spread = $this->spread();
        $spread->layout_id = $layout_id;
        $spread->push();
    }

    /**
     * назначает шаблон
     * @return void
     */
    /*    public function getLayoutId($currentSpread)
        {
            $spread = $this->printout->spreads()->where('spread_nr', $currentSpread)->first();
            return $spread ? $spread->getAttribute('layout_id') : null;
        }*/


    /*
        public function getLayout()
        {
            $this->layout = $this->printout->layouts()
                ->where('id', $this->printout->current_layout_id)->first();
        }*/

}
