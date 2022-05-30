<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item\ItemSpreadType
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemSpreadType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ItemSpreadType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemSpreadType withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $short_title
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSpreadType whereShortTitle($value)
 */
class ItemSpreadType extends Model
{
    use SoftDeletes;

    protected $table = 'item_spread_types';
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
