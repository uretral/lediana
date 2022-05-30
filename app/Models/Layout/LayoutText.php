<?php

namespace App\Models\Layout;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Layout\LayoutText
 *
 * @property int $id
 * @property int $layout_id
 * @property float|null $width
 * @property float|null $height
 * @property float|null $top
 * @property float|null $bottom
 * @property float|null $left
 * @property float|null $right
 * @property string|null $align
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText query()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereAlign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereWidth($value)
 * @mixin \Eloquent
 * @property int|null $w
 * @property int|null $h
 * @property int|null $t
 * @property int|null $r
 * @property int|null $b
 * @property int|null $l
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText whereW($value)
 * @property string|null $placeholder
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutText wherePlaceholder($value)
 */
class LayoutText extends Model
{
    protected $table = 'layout_texts';
    protected $guarded = [];
}
