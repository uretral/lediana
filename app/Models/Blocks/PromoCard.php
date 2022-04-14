<?php

namespace App\Models\Blocks;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Blocks\PromoCard
 *
 * @property int $id
 * @property string $page_id
 * @property int $order
 * @property string $active
 * @property string|null $title
 * @property string|null $text
 * @property string|null $img
 * @property string|null $img_mobile
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereImgMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoCard whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read Page|null $page
 */
class PromoCard extends Model
{
    protected $table = 'block_promo_cards';

    public function page(): HasOne
    {
        return $this->hasOne(Page::class,'id','page_id');
    }
}
