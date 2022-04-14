<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\Info
 *
 * @property int $id
 * @property string $page_id
 * @property string|null $title
 * @property string|null $text
 * @property string|null $link
 * @property string|null $link_text
 * @property string|null $img
 * @property string|null $img_mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info query()
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereImgMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereLinkText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Info extends Model
{
    protected $table = 'block_info';
}
