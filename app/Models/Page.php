<?php

namespace App\Models;

use App\Models\Blocks\About;
use App\Models\Blocks\Advantage;
use App\Models\Blocks\Creations;
use App\Models\Blocks\CrossLink;
use App\Models\Blocks\Gift;
use App\Models\Blocks\Info;
use App\Models\Blocks\PhotoTitle;
use App\Models\Blocks\PromoCard;
use App\Models\Blocks\Promotion;
use App\Models\Blocks\Reviews;
use App\Models\Blocks\Slide;
use App\Models\Blocks\Text;
use App\Models\Services\Menu;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $order
 * @property int $status
 * @property string|null $title
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $slug
 * @property string|null $type
 * @property string|null $blocks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $children
 * @property-read int|null $children_count
 * @property-read Page|null $parent
 * @property-read PromoCard|null $promoCard
 * @property-read \Illuminate\Database\Eloquent\Collection|Reviews[] $reviews
 * @property-read int|null $reviews_count
 * @property-read Slide|null $slide
 * @property-read \Illuminate\Database\Eloquent\Collection|Text[] $texts
 * @property-read int|null $texts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $menu_title
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMenuTitle($value)
 */
class Page extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'pages';

    public function texts(): HasMany
    {
        return $this->hasMany(Text::class,'page_id','id');
    }

    public function slide(): HasOne
    {
        return $this->hasOne(Slide::class,'page_id','id');
    }

    public function promoCard(): HasOne
    {
        return $this->hasOne(PromoCard::class,'page_id','id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Reviews::class,'product_id','id');
    }

    public function promotion(): HasOne
    {
        return $this->hasOne(Promotion::class,'id','promotion_id');
    }

    public function info(): HasOne
    {
        return $this->hasOne(Info::class,'page_id','id');
    }

    public function about(): HasOne
    {
        return $this->hasOne(About::class,'page_id','id');
    }

    public function crossLink(): HasMany
    {
        return $this->hasMany(CrossLink::class,'page_id','id');
    }

    public function galleryTitle(): HasMany
    {
        return $this->hasMany(PhotoTitle::class,'page_id','id');
    }

    public function creation(): HasOne
    {
        return $this->hasOne(Creations::class,'page_id','id');
    }

    public function gift(): HasOne
    {
        return $this->hasOne(Gift::class,'page_id','id');
    }

    public function advantage(): HasMany
    {
        return $this->hasMany(Advantage::class,'page_id','id');
    }

}

