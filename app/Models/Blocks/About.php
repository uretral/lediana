<?php

namespace App\Models\Blocks;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blocks\About
 *
 * @property int $id
 * @property string $page_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $image
 * @property string|null $stat_sizes
 * @property string|null $stat_sizes_text
 * @property string|null $stat_pages
 * @property string|null $stat_pages_text
 * @property string|null $stat_covers
 * @property string|null $stat_covers_text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|About newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About query()
 * @method static \Illuminate\Database\Eloquent\Builder|About whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereStatCovers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereStatCoversText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereStatPages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereStatPagesText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereStatSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereStatSizesText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class About extends Model
{
    protected $table = 'block_about';
    protected $guarded = [];
}
