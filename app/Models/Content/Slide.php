<?php

namespace App\Models\Content;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * App\Models\Content\Slide
 *
 * @property int $id
 * @property int $product_id
 * @property int $sort
 * @property int $active
 * @property string|null $title
 * @property string|null $text
 * @property string|null $img
 * @property string|null $img_mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Query\Builder|Slide onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereImgMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Slide withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Slide withoutTrashed()
 * @mixin \Eloquent
 */
class Slide extends Model
{
    use SoftDeletes;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
