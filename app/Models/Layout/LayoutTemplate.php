<?php

namespace App\Models\Layout;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Layout\LayoutTemplate
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $tpl_key
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate whereTplKey($value)
 * @property int $order
 * @method static \Illuminate\Database\Eloquent\Builder|LayoutTemplate whereOrder($value)
 */
class LayoutTemplate extends Model
{
    protected $table = 'layout_templates';
}
