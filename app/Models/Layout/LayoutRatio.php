<?php

namespace App\Models\Layout;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Layout\LayoutType
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutRatio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutRatio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutRatio query()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutRatio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutRatio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutRatio whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutRatio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LayoutRatio extends Model
{
    protected $table = 'layout_ratios';
}
