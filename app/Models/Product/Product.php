<?php

namespace App\Models\Product;

use App\Models\Content\Slide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Product\Product
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $text
 * @property string|null $slug
 * @property string|null $photo_preview
 * @property string|null $photo_preview_mobile
 * @property string|null $price
 * @property int|null $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Slide|null $hasSlide
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePhotoPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePhotoPreviewMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $guarded = [];


    public function hasSlide(): HasOne
    {
        return $this->hasOne(Slide::class);
    }
}
