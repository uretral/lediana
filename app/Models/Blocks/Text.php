<?php

namespace App\Models\Blocks;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Blocks\Text
 *
 * @property int $id
 * @property string $page_id
 * @property string $title
 * @property string|null $text
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Page|null $page
 * @method static \Illuminate\Database\Eloquent\Builder|Text newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Text newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Text query()
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Text whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Text extends Model
{
    protected $table = 'block_texts';
    protected $guarded = [];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'id', 'page_id');
    }
}
