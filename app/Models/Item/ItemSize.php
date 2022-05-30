<?php

namespace App\Models\Item;

use App\Models\Layout\Layout;
use App\Models\Product\Price;
use Illuminate\Database\Eloquent\Builder;
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
 * @property float|null $rem
 * @property-read string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|Price[] $prices
 * @property-read int|null $prices_count
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSize whereRem($value)
 * @property int $sort
 * @method static Builder|ItemSize whereSort($value)
 * @property int|null $ratio_id
 * @property-read \Illuminate\Database\Eloquent\Collection|Layout[] $layouts
 * @property-read int|null $layouts_count
 * @method static Builder|ItemSize whereRatioId($value)
 */
class ItemSize extends Model
{
    use SoftDeletes;

    protected $table = 'item_sizes';
    protected $guarded = [];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('sort', 'asc');
        });

        static::creating(function ($itemSize) {
            return self::modifyRatio($itemSize);
        });
        static::updating(function ($itemSize) {
            return self::modifyRatio($itemSize);
        });
        static::saving(function ($itemSize) {
            return self::modifyRatio($itemSize);
        });
    }

    public function modifyRatio(ItemSize $itemSize): ItemSize
    {
        $ratio = $itemSize->width / $itemSize->height;
        if ($ratio == 1) {
            $itemSize->ratio_id = 1;
        } elseif ($ratio > 1) {
            $itemSize->ratio_id = 2;
        } elseif ($ratio < 1) {
            $itemSize->ratio_id = 3;
        }
        return $itemSize;
    }

    public array $labelsArray = [];

    public function setSizesAttribute()
    {
        $width = (int)$this->width == $this->width ? (int)$this->width : round($this->width, 1);
        $height = (int)$this->height == $this->height ? (int)$this->height : round($this->height, 1);
        $this->attributes['sizes'] = $width . '×' . $height;
    }

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

    public function layouts(): HasMany
    {
        return $this->hasMany(Layout::class, 'ratio_id', 'ratio_id');
    }
/*    public function layoutCovers(): HasMany
    {
        return $this->hasMany(Layout::class, 'ratio_id', 'ratio_id')->where('template_id', 1);
    }

    public function layoutSpreads(): HasMany
    {
        return $this->hasMany(Layout::class, 'ratio_id', 'ratio_id')->where('template_id', '!=',1);
    }*/

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
