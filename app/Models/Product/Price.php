<?php

namespace App\Models\Product;

use App\Models\Item\ItemAttribute;
use App\Models\Item\ItemCoverType;
use App\Models\Item\ItemSize;
use App\Models\Item\ItemSizeTitle;
use App\Models\Item\ItemSpreadType;
use App\Models\Printout\Printout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product\Price
 *
 * @property int $id
 * @property int $size_id
 * @property string|null $prop_name
 * @property int|null $prop_id
 * @property int|null $copies
 * @property int|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Query\Builder|Price onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCopies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePropId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePropName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Price withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Price withoutTrashed()
 * @mixin \Eloquent
 * @property-read ItemAttribute|null $attributes
 * @property-read ItemCoverType|null $cover
 * @property-read ItemSizeTitle|null $format
 * @property-read ItemSpreadType|null $spreadType
 * @property int|null $product_id
 * @property-read \Illuminate\Database\Eloquent\Collection|ItemSizeTitle[] $formats
 * @property-read int|null $formats_count
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereProductId($value)
 * @property-read ItemSize|null $size
 */
class Price extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function format(): HasOne
    {
        return $this->hasOne(ItemSizeTitle::class, 'id', 'prop_id');
    }

    public function formats(): HasMany
    {
        return $this->hasMany(ItemSizeTitle::class, 'id', 'prop_id');
    }

    public function spreadType(): HasOne
    {
        return $this->hasOne(ItemSpreadType::class, 'id', 'prop_id');
    }

    public function cover(): HasOne
    {
        return $this->hasOne(ItemCoverType::class, 'id', 'prop_id');
    }

    public function attributes(): HasOne
    {
        return $this->hasOne(ItemAttribute::class, 'id', 'prop_id');
    }

    public function size(): HasOne
    {
        return $this->hasOne(ItemSize::class, 'id', 'size_id');
    }
}
