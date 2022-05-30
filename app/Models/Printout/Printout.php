<?php

namespace App\Models\Printout;

use App\Models\Font\FontName;
use App\Models\Font\FontSize;
use App\Models\Item\ItemSize;
use App\Models\Layout\Layout;
use App\Models\Layout\LayoutTemplate;
use App\Models\Photo;
use App\Models\Product\Price;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Printout\Printout
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Printout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Printout newQuery()
 * @method static \Illuminate\Database\Query\Builder|Printout onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Printout query()
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Printout withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Printout withoutTrashed()
 * @mixin \Eloquent
 * @property int|null $cost
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCost($value)
 * @property int|null $size_id
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereSizeId($value)
 * @property int|null $spreads
 * @property-read ItemSize|null $size
 * @property-read \Illuminate\Database\Eloquent\Collection|Price[] $sizes
 * @property-read int|null $sizes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereSpreads($value)
 * @property int|null $current_spread
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCurrentSpread($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Printout\PrintoutSpread[] $printoutSpreads
 * @property-read int|null $printout_spreads_count
 * @property int|null $current_layout
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCurrentLayout($value)
 * @property-read mixed $layout_templates
 * @property-read \Illuminate\Database\Eloquent\Collection|Layout[] $layouts
 * @property-read int|null $layouts_count
 * @property int|null $spreads_cnt
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereSpreadsCnt($value)
 * @property-read int|null $spreads_count
 * @property int|null $current_spread_nr
 * @property int|null $current_layout_id
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCurrentLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCurrentSpreadNr($value)
 * @property int|null $current_spread_id
 * @property int $current_template_id
 * @property-read Layout|null $layout
 * @property-read \App\Models\Printout\PrintoutSpread|null $spread
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCurrentSpreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Printout whereCurrentTemplateId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Printout\PrintoutPhoto[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Photo[] $pics
 * @property-read int|null $pics_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Printout\PrintoutText[] $texts
 * @property-read int|null $texts_count
 * @property-read mixed $font_names
 * @property-read mixed $font_sizes
 */
class Printout extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $hidden = ['created_at','updated_at','deleted_at'];


    // accessors
    public function getLayoutTemplatesAttribute(): \Illuminate\Support\Collection
    {
        return LayoutTemplate::orderBy('order')->get();
    }

    // relations
    public function size() : HasOne
    {
        return $this->hasOne(ItemSize::class,'id','size_id');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Price::class, 'product_id', 'product_id')->where('prop_name','format');
    }

    public function spread() : HasOne
    {
        return $this->HasOne(PrintoutSpread::class,'spread_nr','current_spread_nr');
    }

    public function spreads() : HasMany
    {
        return $this->hasMany(PrintoutSpread::class,'printout_id','id');
    }


    public function layout(): HasOne
    {
        return $this->hasOne(Layout::class,'id','current_spread_id');
    }

    public function layouts(): HasManyThrough
    {
        return $this->hasManyThrough(Layout::class, ItemSize::class,'id', 'ratio_id','size_id','ratio_id');
    }

    public function photos() : HasMany
    {
        return $this->hasMany(PrintoutPhoto::class,'printout_id','id');
    }

    public function texts() : HasMany
    {
        return $this->hasMany(PrintoutText::class,'printout_id','id');
    }

    public function pics() : HasMany
    {
        return $this->hasMany(Photo::class,'printout_id','id');
    }

    public function getFontNamesAttribute(){
        return FontName::all();
    }

    public function getFontSizesAttribute(){
        return FontSize::all();
    }

}
