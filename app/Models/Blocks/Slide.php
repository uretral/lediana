<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Slide
 *
 * @property int $id
 * @property string $page_id
 * @property string|null $title
 * @property string|null $text
 * @property int|null $price_from
 * @property string|null $btn_text
 * @property string|null $btn_link
 * @property string|null $img
 * @property string|null $img_mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereBtnLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereImgMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide wherePriceFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Slide extends Model
{
    protected $table = 'block_slides';
}
