<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item\ItemAttribute
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemAttribute onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ItemAttribute withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemAttribute withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $short_title
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereShortTitle($value)
 * @property string|null $hint
 * @property string|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereHint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemAttribute whereImage($value)
 */
class ItemAttribute extends Model
{
    use SoftDeletes;

    protected $table = 'item_attributes';
    protected $hidden = ['created_at','updated_at','deleted_at'];

}
