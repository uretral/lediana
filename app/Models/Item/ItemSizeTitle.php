<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item\ItemSizeTitle
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemSizeTitle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ItemSizeTitle withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemSizeTitle withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $short_title
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSizeTitle whereShortTitle($value)
 */
class ItemSizeTitle extends Model
{
    use SoftDeletes;
    protected $table = 'item_size_titles';
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
