<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item\ItemSpreadColor
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemSpreadColor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ItemSpreadColor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemSpreadColor withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $short_title
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereShortTitle($value)
 * @property string|null $class
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadColor whereClass($value)
 */
class ItemSpreadColor extends Model
{
    use SoftDeletes;
    protected $table = 'item_spread_colors';
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
