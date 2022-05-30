<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Gift
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $title
 * @property string|null $text
 * @property string|null $img
 * @property string|null $img_mobile
 * @property string|null $btn_text
 * @property string|null $btn_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Gift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gift query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereBtnLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereImgMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gift whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gift extends Model
{
    protected $table = 'block_gifts';
}
