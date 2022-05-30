<?php

namespace App\Models\Layout;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Layout\LayoutPhoto
 *
 * @property int $id
 * @property int $layout_id
 * @property float|null $width
 * @property float|null $height
 * @property float|null $top
 * @property float|null $bottom
 * @property float|null $left
 * @property float|null $right
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $w
 * @property int|null $h
 * @property int|null $t
 * @property int|null $r
 * @property int|null $b
 * @property int|null $l
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto query()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereW($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutPhoto whereWidth($value)
 * @mixin \Eloquent
 */
class LayoutPhoto extends Model
{
    protected $table = 'layout_photos';
    protected $guarded = [];
}
