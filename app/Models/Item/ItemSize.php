<?php

namespace App\Models\Item;

use App\Models\Product\Price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Item\ItemSize
 *
 * @property int $id
 * @property int $product_id
 * @property int $width
 * @property int $height
 * @property array|null $sizes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Price[] $fixed
 * @property-read int|null $fixed_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Price[] $spreadType
 * @property-read int|null $spread_type_count
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemSize onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereWidth($value)
 * @method static \Illuminate\Database\Query\Builder|ItemSize withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemSize withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|Price[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Price[] $cover
 * @property-read int|null $cover_count
 * @property-read Price|null $flyleaf
 * @property-read \Illuminate\Database\Eloquent\Collection|Price[] $format
 * @property-read int|null $format_count
 */
class ItemSize extends Model
{
    use SoftDeletes;

    protected $table = 'item_sizes';
    protected $guarded = [];

    protected $casts = [
        'sizes' => 'array',
    ];

    public array $labelsArray = [];

    /* Relations*/

    public function format(): HasMany
    {
        return $this->hasMany(Price::class, 'size_id', 'id')
            ->where('prop_name', 'format');
    }

    public function fixed(): HasMany
    {
        return $this->hasMany(Price::class, 'size_id', 'id')
            ->where('prop_name', 'fixed');
    }

    public function spreadType(): HasMany
    {
        return $this->hasMany(Price::class, 'size_id', 'id')
            ->where('prop_name', 'spreadType');
    }

    public function cover(): HasMany
    {
        return $this->hasMany(Price::class, 'size_id', 'id')
            ->where('prop_name', 'cover');
    }

    public function flyleaf(): HasOne
    {
        return $this->hasOne(Price::class, 'size_id', 'id')
            ->where('prop_name', 'flyleaf');
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(Price::class, 'size_id', 'id')
            ->where('prop_name', __FUNCTION__);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'size_id', 'id');
    }


    /*admin methods*/

    public function makeLabels($id, $propName, $copies = null): string
    {
        $this->labelsArray = [];
        Price::where('size_id', $id)->where('prop_name', $propName)
            ->each(function ($item) use ($copies) {
                $this->labelsArray[] = '<span class="label label-text">' . $item[$copies] . '</span>';
                $this->labelsArray[] = '<span class="label label-default">' . $item->price . '</span>';
            });

        return $this->labelsArray
            ? implode(' ', $this->labelsArray)
            : '<span class="label label-warning"> не назначено </span>';
    }

    public function makeLabelsWith($id, $propName): string
    {
        $this->labelsArray = [];
        Price::where('size_id', $id)->where('prop_name', $propName)->with($propName)
            ->each(function ($item) use ($propName) {
                $this->labelsArray[] = '<span class="label label-text">' . $item[$propName]['short_title'] . '</span>';
                $this->labelsArray[] = '<span class="label label-default">' . $item->price . '</span>';
            });
        return $this->labelsArray
            ? implode(' ', $this->labelsArray)
            : '<span class="label label-warning"> не назначено </span>';
    }
}
