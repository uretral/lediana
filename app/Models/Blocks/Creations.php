<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Creations
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $title
 * @property string|null $text
 * @property string|null $btn_text
 * @property string|null $btn_link
 * @property string|null $img
 * @property string|null $img_mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Creations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Creations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Creations query()
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereBtnLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereBtnText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereImgMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Creations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Creations extends Model
{
    protected $table = 'block_creations';
}
