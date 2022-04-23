<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item\ItemCoverType
 *
 * @property int $id
 * @property int $sort
 * @property int $active
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemCoverType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ItemCoverType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemCoverType withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $short_title
 * @property string|null $text
 * @property array|null $materials
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereMaterials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereShortTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemCoverType whereText($value)
 */
class ItemCoverType extends Model
{
    use SoftDeletes;

    protected $table = 'item_cover_types';
    protected $casts = [
        'materials' => 'array'
    ];

/*    public function material(){
        return $this->hasMany(ItemCoverMaterial::class, 'id', 'materials');
    }*/
}
