<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item\ItemCoverMaterial
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemCoverMaterial onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ItemCoverMaterial withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemCoverMaterial withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $short_title
 * @property string|null $text
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereShortTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereText($value)
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverMaterial whereIcon($value)
 */
class ItemCoverMaterial extends Model
{
    use SoftDeletes;

    protected $table = 'item_cover_materials';
    protected $hidden = ['created_at','updated_at','deleted_at'];
}
