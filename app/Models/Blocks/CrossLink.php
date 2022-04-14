<?php

namespace App\Models\Blocks;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Blocks\CrossLink
 *
 * @property int $id
 * @property int $page_id
 * @property string|null $title
 * @property string|null $text
 * @property int|null $link_page
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Page|null $link
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink whereLinkPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CrossLink whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CrossLink extends Model
{
    protected $table = 'block_cross_links';
    protected $guarded = [];

    public function link(): HasOne{
        return $this->hasOne(Page::class,'id','link_page');
    }
}
