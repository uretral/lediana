<?php

namespace App\Traits\Editor;

use App\Models\Layout\LayoutPhoto;
use App\Models\Layout\LayoutText;
use App\Models\Printout\PrintoutSpread;
use App\Models\Printout\PrintoutText;

trait Texts
{
    public ?bool $textModalOpen = false;
    public ?bool $spineTextModalOpen = false;
    public string $spineText = '';
    public ?PrintoutText $textModal = null;


    protected array $rulesText = [
        'textModal.text' => '',
        'textModal.font_size' => '',
        'textModal.font_color' => '',
    ];

/*    public function getTextHtml(PrintoutSpread $spread, LayoutText $text): string
    {
        $res = $this->printout->texts()
            ->where('printout_id', $this->printout_id)
            ->where('spread_nr', $spread->spread_nr)
            ->where('layout_id', $text->layout_id)
            ->where('layout_text_id', $text->id)
            ->first();
        return $res ? '<span style="' . $this->getStyle($res, $text) . '">' . $res->text . '</span>' : '';
    }
    */
    public function getTextHtml(PrintoutSpread $spread, LayoutText $text): string
    {
        $res = $this->printout->texts()
            ->where('printout_id', $this->printout_id)
            ->where('layout_id', $text->layout_id)
            ->where('layout_text_id', $text->id)
            ->first();
        return $res ? '<span class="text-blade" style="' . $this->getStyle($res, $text) . '">' . $res->text . '</span>' : '';
    }

    public function getStyle($res, $text): string
    {
        return $this->getFontNameStyle($res->font_name)
            . $this->getFontSizeStyle($res->font_size)
            . $this->textColor($res)
            . $this->textAlign($text);
    }

    public function textAlign($text): string
    {
        if ($text->align) {
            return 'text-align:' . $text->align;
        } else {
            return 'text-align: left;';
        }
    }

    public function textColor($res): string
    {
        if ($res->font_color) {
            return 'color:' . $res->font_color . ';';
        } else {
            return '';
        }
    }

    public function spineEdit() {
        $this->spineTextModalOpen = true;
    }
    public function spineEditClose() {
        $this->spineTextModalOpen = false;
    }
    public function spineTextEdit() {
        $this->printout->update([
            'spine_text' => $this->spineText
        ]);
        $this->spineTextModalOpen = false;
    }

    public function onTextEdit($spread_id, $layout_id, $text_id)
    {
//        dump('adfsdfsf',$spread_id, $layout_id, $text_id);
        $this->textModalOpen = true;
        $this->textModal = $this->printout->texts()->firstOrCreate([
            'printout_id' => $this->printout->id, 'layout_id' => $layout_id,
            'layout_text_id' => $text_id, 'spread_id' => $spread_id
        ]);
/*        if($this->printout->spread && $spread_nr ===  $this->activeSpread->spread_nr){
            $this->textModalOpen = true;
            $this->textModal = $this->printout->texts()->firstOrCreate([
                'printout_id' => $this->printout->id, 'layout_id' => $layout_id,
                'layout_text_id' => $text_id, 'spread_nr' => $spread_nr
            ]);
        }*/

    }

    public function getFontName($id): string
    {
        $fontName = $this->printout->fontNames->where('id', $id)->first();
        return $fontName ? $fontName->getAttribute('title') : '';
    }

    public function getFontNameStyle($id): string
    {
        $fontName = $this->printout->fontNames->where('id', $id)->first();
        return $fontName ? $fontName->getAttribute('style') : '';
    }

    public function getFontSizeStyle($id): string
    {
        $fontName = $this->printout->fontSizes->where('id', $id)->first();
        return $fontName ? $fontName->getAttribute('style') : '';
    }

    public function setText($value)
    {
        $this->textModal->text = $value;
        $this->textModal->push();
    }

    public function setFontName($value)
    {
        $this->textModal->font_name = $value;
        $this->textModal->push();
    }

    public function textModalClose()
    {
        $this->textModalOpen = false;
    }

    public function textModalSave()
    {
        $this->textModal->push();
        $this->textModalClose();
    }

    public function unsetTexts(){
        $this->printout->texts()->where('spread_nr',$this->printout->current_spread_nr)->delete();
    }

    /*        $this->printoutText->printout_id = $this->printout_id;
            $this->printoutText->layout_id = $layout_id;
            $this->printoutText->layout_text_id = $layout_text_id;
            $this->printoutText->spread_nr = $spread_nr;
            $this->printoutText->text = 'Нажмите чтобы ввести текст';
            $this->printoutText->font_name = 'font-family: inherit;';
            $this->printoutText->font_size = 'font-size: 90%;';
            $this->printoutText->font_color = 'font-color: #000;';*/
    /*id
    printout_id
    layout_id
    layout_text_id
    spread_nr
    text
    font_name
    font_size
    font_color
    */
}
