<?php

namespace App\Models\Printout;

use App\Models\Font\FontName;
use App\Models\Font\FontSize;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Printout\PrintoutText
 *
 * @property int $id
 * @property int $printout_id
 * @property int $layout_id
 * @property int $spread_nr
 * @property string|null $text
 * @property int|null $font_name
 * @property int|null $font_size
 * @property string|null $font_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereFontColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereFontName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereFontSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText wherePrintoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereSpreadNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $layout_text_id
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereLayoutTextId($value)
 * @property string $text_align
 * @property-read mixed $style
 * @method static \Illuminate\Database\Eloquent\Builder|PrintoutText whereTextAlign($value)
 */
class PrintoutText extends Model
{
    protected $table = 'printout_texts';
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $guarded = [];

    public function getStyleAttribute(): string
    {
        return $this->fontFamily($this->font_name)
            .$this->fontSize($this->font_size)
            .$this->fontColor($this->font_color)
            .$this->textAlign($this->text_align);
    }

    public function fontFamily($id){
        return FontName::whereId($id ?? 1)->first()->getAttribute('style');
    }

    public function fontSize($id){
        return FontSize::whereId($id ?? 1)->first()->getAttribute('style');
    }

    public function fontColor($color): string
    {
        return "color: $color;";
    }
    public function textAlign($align): string
    {
        return "text-align: $align;";
    }
}
