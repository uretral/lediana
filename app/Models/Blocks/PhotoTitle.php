<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\PhotoTitle
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $title
 * @property string|null $img_1
 * @property string|null $img_2
 * @property string|null $img_3
 * @property string|null $img_4
 * @property string|null $img_5
 * @property string|null $img_6
 * @property string|null $img_7
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereImg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereImg3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereImg4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereImg5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereImg6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereImg7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhotoTitle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhotoTitle extends Model
{
    protected $table = 'block_photo_title';
    protected $guarded = [];
}
